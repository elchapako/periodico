<?php

use App\Edition;
use App\Section;

class AssignSectionsTest extends FeatureTestCase
{
    public function test_assign_sections_to_new_edition()
    {

        $sec1 = Section::create([
            'name' => 'Central',
            'pages' => 4
        ]);

        $edition = factory(Edition::class)->create([
            'status' => 'next',
            'number_of_edition' => 1234
        ]);

        //$edition->assign($sec1);
        //        dd(Page::all());
        }
}
