<?php

use Illuminate\Database\Seeder;

class SectionNamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\SectionName::class)->create([
            'name' => 'Edicion-Central'
        ]);
        factory(App\SectionName::class)->create([
            'name' => 'Campeón'
        ]);
        factory(App\SectionName::class)->create([
            'name' => 'Crónica'
        ]);
        factory(App\SectionName::class)->create([
            'name' => 'Comodín'
        ]);
        factory(App\SectionName::class)->create([
            'name' => 'Pura Cepa'
        ]);
    }
}
