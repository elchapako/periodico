<?php

use Illuminate\Database\Seeder;

class EditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Edition::class)->create([
           'date' => '2017/01/26',
           'number_of_edition' => '8459'
        ]);
    }
}
