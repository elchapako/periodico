<?php

use App\Area;
use App\Edition;
use App\Model;
use Carbon\Carbon;

class EditPageTest extends FeatureTestCase
{
    public function test_editor_can_see_list_of_pages_of_active_edition()
    {
        $editor = $this->defaultUser([
            'name' => 'Jorge Quiros'
        ])->assign('editor');

        $edition = factory(Edition::class)->create([
            'date' => Carbon::today(),
            'number_of_edition' => 5555,
            'status' => 'active'
        ]);

        $this->createSectionRegular('Edicion Central', 20);
        $this->createSectionRegular('Campeón', 8);
        $this->createSectionRegular('Crónica', 8);
        $this->createSectionRegular('Comodín');
        $this->createSectionRegular('Pura Cepa');

        $edition->builderEdition();

        $this->actingAs($editor)
            ->visit(route('active-pages.index'))
            ->see('Lista de Páginas de la Edición Activa')
            ->see('Edicion Central')
            ->see('1');
    }

    private function createSectionRegular($name, $pages = 4)
    {
        factory(App\Section::class)->create([
            'name' => $name,
            'pages' => $pages,
        ]);
    }

    public function test_editor_can_edit_a_active_page()
    {
        $editor = $this->defaultUser([
            'name' => 'Jorge Quiros'
        ])->assign('editor');

        $edition = factory(Edition::class)->create([
            'date' => Carbon::today(),
            'number_of_edition' => 5555,
            'status' => 'active'
        ]);

        $this->createSectionRegular('Edicion Central', 20);

        $edition->builderEdition();

        $model = factory(Model::class)->create([
            'name' => 'modelo 1'
        ]);

        $area1 = factory(Area::class)->create([
            'name' => 'local'
        ]);

        $this->actingAs($editor)
            ->visit(route('active-pages.index'))
            ->see('Lista de Páginas de la Edición Activa')
            ->see('Edicion Central')
            ->see('1')
            ->click('Editar')
            ->see('Editando Página')
            ->select($area1->id, 'area_id')
            ->select($model->id, 'model_id')
            ->press('Actualizar Página')
            ->seeInDatabase('pages', [
                'area_id' => $area1->id,
                'model_id' => $model->id
            ]);
    }

    public function test_editor_can_see_assign_notes_botton()
    {
        $editor = $this->defaultUser([
            'name' => 'Jorge Quiros'
        ])->assign('editor');

        $edition = factory(Edition::class)->create([
            'date' => Carbon::today(),
            'number_of_edition' => 5555,
            'status' => 'active'
        ]);

        $this->createSectionRegular('Edicion Central', 20);

        $edition->builderEdition();

        $this->actingAs($editor)
            ->visit(route('active-pages.index'))
            ->see('Lista de Páginas de la Edición Activa')
            ->see('Edicion Central')
            ->see('1')
            ->click('Agregar Noticias')
            ->see('Noticias');
    }
}
