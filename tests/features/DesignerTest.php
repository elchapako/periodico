<?php

class DesignerTest extends FeatureTestCase
{
    public function test_designer_can_see_list_of_pages_ready_to_design()
    {
        $designer = $this->defaultUser([
            'name' => 'Jaime Bacotich'
        ])->assign('designer');

        $section = factory(\App\Section::class)->create([
            'name' => 'Edicion Central'
        ]);

        $edition = factory(\App\Edition::class)->create([
            'date' => \Carbon\Carbon::today(),
            'status' => 'active'
        ]);

        $editionsection = factory(\App\Editionsection::class)->create([
            'edition_id' => $edition->id,
            'section_id' => $section->id
        ]);

        $model = factory(\App\Model::class)->create();

        $area = factory(\App\Area::class)->create([
            'name' => 'Local'
        ]);

        $page = factory(\App\Page::class)->create([
            'status' => 4,
            'page_number' => '5',
            'area_id' => $area->id,
            'model_id' => $model->id,
            'editionsection_id' => $editionsection->id
        ]);

        $this->actingAs($designer)
            ->visit(route('ready-pages-to-design.index'))
            ->see('Lista de Páginas para diseñar')
            ->see($page->page_number);
    }
}
