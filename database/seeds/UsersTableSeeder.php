<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
           'first_name' => 'Edwin',
           'last_name' => 'Ibañez',
           'username' => 'elchapako',
           'phone' => '72972222',
           'ci' => '5059076',
           'birthday' => '1990-02-25',
           'active' => true,
           'email' => 'el.chapako@gmail.com',
           'password' => bcrypt('admin')
        ]);
        factory(App\User::class, 49)->create();
    }
}
