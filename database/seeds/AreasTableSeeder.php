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
            'name' => 'Tapa'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Editorial'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Opinión'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Seguridad'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Educación'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Política'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Reportaje'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Sociedad'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Cultura'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Nacional'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Internacional'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Al Cierre'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Contra Tapa'
        ]);
    }
}
