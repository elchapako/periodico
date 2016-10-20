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
           'name' => 'Edwin',
           'email' => 'el.chapako@gmail.com',
           'password' => bcrypt('admin')
        ]);
        factory(App\User::class, 49)->create();
    }
}
