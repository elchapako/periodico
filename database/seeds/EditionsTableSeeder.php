<?php

use App\Editionsection;
use App\Section;
use Carbon\Carbon;
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
           'date' => Carbon::tomorrow(),
           'number_of_edition' => '8459',
           'status' => 'active'
        ]);

        $sections = Section::regulars()->get();

        $sections->each(function ($section)
        {
            $editionSection =
                Editionsection::create([
                'section_id' => $section->id,
                'edition_id' => '1'
            ]);
            $editionSection->addPages($section->pages);
        });
    }
}
