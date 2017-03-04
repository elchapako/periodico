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
            'pages' => 20,
            'isRegular' => true
        ]);
        factory(App\Section::class)->create([
            'name' => 'Campeón',
            'pages' => 8,
            'isRegular' => true
        ]);
        factory(App\Section::class)->create([
            'name' => 'Crónica',
            'pages' => 8,
            'isRegular' => true
        ]);
        factory(App\Section::class)->create([
            'name' => 'Comodín',
            'pages' => 4,
            'isRegular' => true
        ]);
        factory(App\Section::class)->create([
            'name' => 'Pura Cepa',
            'pages' => 4,
            'isRegular' => true
        ]);
    }
}
