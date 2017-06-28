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
        $this->call(SectionsTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(EditionsTableSeeder::class);
        $this->call(NotesTableSeeder::class);
        $this->call(ModelsTableSeeder::class);
    }
}
