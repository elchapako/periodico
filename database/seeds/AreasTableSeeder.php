<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Area::class)->create([
            'name' => 'Política'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Economía'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Sociedad'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Al Cierre'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Nacional'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Internacional'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Reportaje'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Opinion'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Editorial'
        ]);

    }
}
