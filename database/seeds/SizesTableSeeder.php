<?php

use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Size::class)->create([
            'size' => '1 página',
        ]);
        factory(App\Size::class)->create([
            'size' => '1/2 página',
        ]);
        factory(App\Size::class)->create([
            'size' => '1/4 página',
        ]);
        factory(App\Size::class)->create([
            'size' => '1/8 página',
        ]);
        factory(App\Size::class)->create([
            'size' => '2x3 modulos',
        ]);
        factory(App\Size::class)->create([
            'size' => '3x4 modulos',
        ]);
        factory(App\Size::class)->create([
            'size' => '3x8 modulos',
        ]);
    }
}
