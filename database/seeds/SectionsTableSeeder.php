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
            'name' => 'Edicion-Central'
        ]);
        factory(App\Section::class)->create([
            'name' => 'Campeón'
        ]);
        factory(App\Section::class)->create([
            'name' => 'Crónica'
        ]);
        factory(App\Section::class)->create([
            'name' => 'Comodín'
        ]);
        factory(App\Section::class)->create([
            'name' => 'Pura Cepa'
        ]);
    }
}
