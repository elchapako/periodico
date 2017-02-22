<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BouncerRolesSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(SectionNamesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
       // $this->call(EditionsTableSeeder::class);

    }
}
