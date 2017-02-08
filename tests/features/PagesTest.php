<?php

use App\Page;

class PagesTest extends FeatureTestCase
{
    function test_pages_list()
    {
        $ji = $this->defaultUser([
            'name' => 'Edwin Ibañez'
        ])->assign('info-manager');

        $area= factory(App\Area::class)->create([
            'name' => 'Local'
        ]);

        $section= factory(App\Section::class)->create([
            'name' => 'Edicion Central'
        ]);

        $this->actingAs($ji);

        Page::create([
           'area_id' => $area->id,
           'section_id' => $section->id
        ]);

        //when
        $this->actingAs($ji)
            ->visit(route('pages.index'))
            ->see('Local')
            ->see('Edicion Central');
    }
}
