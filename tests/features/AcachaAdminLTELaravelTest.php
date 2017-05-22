<?php

class AcachaAdminLTELaravelTest extends FeatureTestCase
{

    function testLoginPage()
    {
        $this->visit('/login')
            ->see('Inicia sesión para acceder');
    }

    public function test_user_can_login()
    {
        $user = factory(App\User::class)->create(['password' => Hash::make('passw0RD')]);

        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('passw0RD', 'password')
            ->press('Iniciar Sesión')
            ->seePageIs('/')
            ->see($user->name);
    }

    function testLoginRequiredFields()
    {
        $this->visit('/login')
            ->type('', 'email')
            ->type('', 'password')
            ->press('Iniciar Sesión')
            ->see('El campo correo electrónico es obligatorio')
            ->see('El campo contraseña es obligatorio');
    }

    function testRegisterPage()
    {
        $this->visit('/register')
            ->see('Registar un nuevo miembro');
    }


    function testPasswordResetPage()
    {
        $this->visit('/password/reset')
            ->see('Restablecer la contraseña');
    }


    function testHomePageForUnauthenticatedUsers()
    {
        $this->visit('/home')
            ->seePageIs('/login');
    }

    public function testHomePageForAuthenticatedUsers()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/home')
            ->see($user->name);
    }

    public function testLogout()
    {
        $user = factory(App\User::class)->create();

        $form = $this->actingAs($user)->visit('/')->getForm('logout');

        $this->actingAs($user)
            ->visit('/')
            ->makeRequestUsingForm($form)
            ->seePageIs('/login');
    }


    //function test404Page()
    //{
    //    $this->get('asdasdjlapmnnk')
    //        ->seeStatusCode(404)
    //        ->see('404');
    //}

    function testSendPasswordReset()
    {
        $user = factory(App\User::class)->create();

        $this->visit('password/reset')
            ->type($user->email, 'email')
            ->press('Enviar el enlace')
            ->see('¡Te hemos enviado por correo el enlace para restablecer tu contraseña!');
    }

    function testSendPasswordResetUserNotExists()
    {
        $this->visit('password/reset')
            ->type('notexistingemail@gmail.com', 'email')
            ->press('Enviar el enlace')
            ->see('Hay algunos problemas con su entrada.');
    }
}