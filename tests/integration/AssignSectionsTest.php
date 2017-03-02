<?php

use App\Section;

class AssignSectionsTest extends FeatureTestCase
{
    public function test_assign_sections_to_new_edition()
    {
        $sec1 = Section::create([
            'name' => 'Central'
        ]);

        $edition = factory(App\Edition::class)->create();
        //$edition->assignSections();

        //$this->seeInDatabase('edition_section', [
        //   'section_id' => $sec1->id,
        //   'edition_id'     => $edition->id
        //]);
    }
}
