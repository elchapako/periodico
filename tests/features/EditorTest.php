<?php

use App\Note;

class EditorTest extends FeatureTestCase
{
    public function test_editor_can_see_list_of_notes_corrected()
    {
        $reporter = $this->defaultUser([
            'name' => 'Jesus Vargas'
        ])->assign('reporter');

        $ji = $this->defaultUser([
            'name' => 'Jorge Quiroz'
        ])->assign('info-manager');

        $area = factory(App\Area::class)->create([
            'name' => 'local'
        ]);

        Note::create([
            'title' => 'esto es el titulo',
            'note' => 'aqui es la noticia',
            'area_id' => $area->id,
            'reporter_id' => $reporter->id,
            'status' => 3
        ]);

        $this->actingAs($ji)
            ->visit(route('corrected-notes.index'))
            ->see('Lista de Noticias Corregidas')
            ->see('esto es el titulo')
            ->see($area->name)
            ->see($reporter->name)
            ->see('Editar');
    }

    public function test_editor_can_edit_notes_corrected()
    {
        $reporter = $this->defaultUser([
            'name' => 'Jesus Vargas'
        ])->assign('reporter');

        $ji = $this->defaultUser([
            'name' => 'Jorge Quiroz'
        ])->assign('info-manager');

        $area = factory(App\Area::class)->create([
            'name' => 'local'
        ]);

        Note::create([
            'title' => 'esto es el titulo',
            'note' => 'aqui es la noticia',
            'area_id' => $area->id,
            'reporter_id' => $reporter->id,
            'status' => 3
        ]);

        $this->actingAs($ji)
            ->visit(route('corrected-notes.index'))
            ->see('Lista de Noticias Corregidas')
            ->see('esto es el titulo')
            ->see($area->name)
            ->see($reporter->name)
            ->click('Editar')
            ->see('Editando Noticia')
            ->see('esto es el titulo')
            ->see($area->name)
            ->see($reporter->name)
            ->see('aqui es la noticia')
            ->type('cambiando lo que dice la noticia', 'note')
            ->press('Guardar Noticia')
            ->seePageIs(route('corrected-notes.index'))
            ->seeInDatabase('notes', [
                'title' =>  'esto es el titulo',
                'note' => 'cambiando lo que dice la noticia'
            ]);
    }
}
