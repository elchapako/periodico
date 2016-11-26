<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;

/**
 * Class AcachaAdminLTELaravelTest.
 */
class AcachaAdminLTELaravelTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test Landing Page.
     *
     * @return void
     */
    public function testLandingPage()
    {
        $this->visit('/')
             ->see('Login');
    }

    /**
     * Test Login Page.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->visit('/login')
            ->see('Inicia sesión para acceder');
    }

    /**
     * Test Login.
     *
     * @return void
     */
    public function testLogin()
    {
        $user = factory(App\User::class)->create(['password' => Hash::make('passw0RD')]);

        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('passw0RD', 'password')
            ->press('Iniciar Sesión')
            ->seePageIs('/')
            ->see($user->name);
    }

    /**
     * Test Login.
     *
     * @return void
     */
    public function testLoginRequiredFields()
    {
        $this->visit('/login')
            ->type('', 'email')
            ->type('', 'password')
            ->press('Iniciar Sesión')
            ->see('El campo correo electrónico es obligatorio')
            ->see('El campo contraseña es obligatorio');
    }

    /**
     * Test Register Page.
     *
     * @return void
     */
    public function testRegisterPage()
    {
        $this->visit('/register')
            ->see('Registar un nuevo miembro');
    }

    /**
     * Test Password reset Page.
     *
     * @return void
     */
    public function testPasswordResetPage()
    {
        $this->visit('/password/reset')
            ->see('Restablecer la contraseña');
    }

    /**
     * Test home page is only for authorized Users.
     *
     * @return void
     */
    public function testHomePageForUnauthenticatedUsers()
    {
        $this->visit('/home')
            ->seePageIs('/login');
    }

    /**
     * Test home page works with Authenticated Users.
     *
     * @return void
     */
    public function testHomePageForAuthenticatedUsers()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/home')
            ->see($user->name);
    }

    /**
     * Test log out.
     *
     * @return void
     */
    /** public function testLogout()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->click($user->name)
            ->click('Sign out')
            ->seePageIs('/');
    }  */

    /**
     * Test 404 Error page.
     *
     * @return void
     */
    public function test404Page()
    {
        $this->get('asdasdjlapmnnk')
           // ->seeStatusCode(404)
            ->see('404');
    }

    /**
     * Test user registration.
     *
     * @return void
     */
    public function testNewUserRegistration()
    {
        $this->visit('/register')
            ->type('Sergi Tur Badenas', 'name')
            ->type('sergiturbadenas@gmail.com', 'email')
            ->type('passw0RD', 'password')
            ->type('passw0RD', 'password_confirmation')
            ->press('Registrar')
            ->seePageIs('/')
            ->seeInDatabase('users', ['email' => 'sergiturbadenas@gmail.com',
                                      'name'  => 'Sergi Tur Badenas', ]);
    }

    /**
     * Test required fields on registration page.
     *
     * @return void
     */
    public function testRequiredFieldsOnRegistrationPage()
    {
        $this->visit('/register')
            ->press('Registrar')
            ->see('El campo nombre es obligatorio')
            ->see('El campo correo electrónico es obligatorio')
            ->see('El campo contraseña es obligatorio');
    }

    /**
     * Test send password reset.
     *
     * @return void
     */
    public function testSendPasswordReset()
    {
        $user = factory(App\User::class)->create();

        $this->visit('password/reset')
            ->type($user->email, 'email')
            ->press('Enviar el enlace')
            ->see('¡Te hemos enviado por correo el enlace para restablecer tu contraseña!');
    }

    /**
     * Test send password reset user not exists.
     *
     * @return void
     */
    public function testSendPasswordResetUserNotExists()
    {
        $this->visit('password/reset')
            ->type('notexistingemail@gmail.com', 'email')
            ->press('Enviar el enlace')
            ->see('Hay algunos problemas con su entrada.');
    }
}
