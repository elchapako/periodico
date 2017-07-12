<?php

class DesignedPagesTest extends FeatureTestCase
{
    public function test_editor_can_see_list_of_designed_pages()
    {
        $editor = $this->defaultUser([
            'name' => 'Jesus Vargas'
        ])->assign('editor');

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
            'status' => 5,
            'page_number' => '5',
            'area_id' => $area->id,
            'model_id' => $model->id,
            'editionsection_id' => $editionsection->id
        ]);

        $this->actingAs($editor)
            ->visit(route('designed-pages.index'))
            ->see('Páginas diseñadas')
            ->see($page->page_number)
            ->click('Mostrar Página');
    }
}
