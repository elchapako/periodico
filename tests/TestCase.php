<?php
use \App\User;
abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * @var \App\User
     */

    protected $adminUser;
    protected $defaultUser;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function adminUser()
    {
        if ($this->adminUser){
            return $this->adminUser;
        }
        return $this->adminUser = factory(User::class)->create([
            'name' => 'Edwin',
            'email' => 'el.chapako@gmail.com',
            'password' => bcrypt('admin')
        ])->assign('admin');
    }

    public function defaultUser(array $attributes = [])
    {
        if ($this->defaultUser) {
            return $this->defaultUser;
        }
        return $this->defaultUser = factory(User::class)->create($attributes);
    }
}
