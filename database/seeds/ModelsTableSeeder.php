<?php

use Illuminate\Database\Seeder;

class ModelsTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Model::class, 30)->create();
    }
}
