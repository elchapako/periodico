<?php

use App\Edition;
use App\Editionsection;

class AddPagesToSectionTest extends FeatureTestCase
{
    public function test_add_pages_to_section()
    {
        $section = factory(App\Section::class)->create([
            'name' => 'Central',
            'pages' => 20,
            'isRegular' => true
        ]);

        Edition::createNextEdition();
        $edition = Edition::latest()->first();

        Editionsection::create([
            'section_id' => $section->id,
            'edition_id' => $edition->id,
           // 'no_pages' => 20
        ]);

        EditionSection::day($edition, $section)->first()->addPages($section->pages);
    }
}
