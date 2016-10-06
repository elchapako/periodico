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
            'name' => 'Local'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Nacional'
        ]);
        factory(App\Area::class)->create([
            'name' => 'Internacional'
        ]);
        factory(App\Area::class, 27)->create();
    }
}
