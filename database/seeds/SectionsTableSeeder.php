<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Section::class)->create([
            'name' => 'Cronica'
        ]);
        factory(App\Section::class)->create([
            'name' => 'Deportivo'
        ]);
        factory(App\Section::class)->create([
            'name' => 'Edicion-Central'
        ]);
        factory(App\Section::class, 27)->create();
    }
}
