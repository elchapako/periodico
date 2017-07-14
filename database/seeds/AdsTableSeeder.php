<?php

use App\Date;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdsTableSeeder extends Seeder
{
    public function run()
    {
        $date = Carbon::tomorrow()->format('Y-m-d');
        $dates = Date::create([
            'dates' => $date
        ]);

        $Ad1 = factory(App\Ad::class)->create([
            'section_id'    => 1,
            'size_id'       => 3
        ]);

        $Ad1->dates()->save($dates);

        $Ad2 = factory(App\Ad::class)->create([
            'section_id'    => 1,
            'size_id'       => 4
        ]);

        $Ad2->dates()->save($dates);

        $Ad3 = factory(App\Ad::class)->create([
            'section_id'    => 1,
            'size_id'       => 2
        ]);

        $Ad3->dates()->save($dates);

        $Ad4 = factory(App\Ad::class)->create([
            'section_id'    => 1,
            'size_id'       => 3
        ]);

        $Ad4->dates()->save($dates);
    }
}
