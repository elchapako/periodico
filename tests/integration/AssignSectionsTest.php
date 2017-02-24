<?php

use App\SectionName;

class AssignSectionsTest extends FeatureTestCase
{
    public function test_assign_sections_to_new_edition()
    {
        $sec1 = SectionName::create([
            'name' => 'Central'
        ]);

        $edition = factory(App\Edition::class)->create();
        $edition->assignSections();

        $this->seeInDatabase('edition_section_name', [
           'section_name_id' => $sec1->id,
           'edition_id'     => $edition->id
        ]);
    }
}
