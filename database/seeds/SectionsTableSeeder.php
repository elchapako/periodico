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
            'name' => 'Edicion-Central',
            'pages' => 20
        ]);
        factory(App\Section::class)->create([
            'name' => 'Campeón',
            'pages' => 8
        ]);
        factory(App\Section::class)->create([
            'name' => 'Crónica',
            'pages' => 8
        ]);
        factory(App\Section::class)->create([
            'name' => 'Comodín',
            'pages' => 4
        ]);
        factory(App\Section::class)->create([
            'name' => 'Pura Cepa',
            'pages' => 4
        ]);
    }
}
