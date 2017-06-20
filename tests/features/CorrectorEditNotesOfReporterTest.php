<?php

use App\Note;

class CorrectorEditNotesOfReporterTest extends FeatureTestCase
{
    public function test_corrector_can_see_list_of_notes_to_correct()
    {
        $reporter = $this->defaultUser([
            'name' => 'Jesus Vargas'
        ])->assign('reporter');

        $jc = $this->defaultUser([
            'name' => 'Paul Gareca'
        ])->assign('review-manager');

        $area = factory(App\Area::class)->create([
            'name' => 'local'
        ]);

        Note::create([
            'title' => 'esto es el titulo',
            'note' => 'aqui es la noticia',
            'area_id' => $area->id,
            'reporter_id' => $reporter->id,
            'status' => 2
        ]);

        $this->actingAs($jc)
            ->visit(route('reviewing-notes.index'))
            ->see('Lista de Noticias para Corregir')
            ->see('esto es el titulo')
            ->see($area->name)
            ->see($reporter->name)
            ->see('Editar');
    }

    public function test_edit_notes_and_save_corrections()
    {
        $reporter = $this->defaultUser([
            'name' => 'Jesus Vargas'
        ])->assign('reporter');

        $jc = $this->defaultUser([
            'name' => 'Paul Gareca'
        ])->assign('review-manager');

        $area = factory(App\Area::class)->create([
            'name' => 'local'
        ]);

        Note::create([
            'title' => 'esto es el titulo',
            'note' => 'aqui es la noticia',
            'area_id' => $area->id,
            'reporter_id' => $reporter->id,
            'status' => 2
        ]);

        $this->actingAs($jc)
            ->visit(route('reviewing-notes.index'))
            ->see('Lista de Noticias para Corregir')
            ->see('esto es el titulo')
            ->see($area->name)
            ->see($reporter->name)
            ->click('Editar')
            ->see('Revisando Noticia')
            ->see('esto es el titulo')
            ->see($area->name)
            ->see('aqui es la noticia')
            ->type('cambiando lo que dice la noticia', 'note')
            ->press('Guardar Noticia')
            ->seePageIs(route('reviewing-notes.index'))
            ->seeInDatabase('notes', [
               'title' =>  'esto es el titulo',
               'note' => 'cambiando lo que dice la noticia'
            ]);
    }

    public function test_send_notes_to_redaction()
    {
        $reporter = $this->defaultUser([
            'name' => 'Jesus Vargas'
        ])->assign('reporter');

        $jc = $this->defaultUser([
            'name' => 'Paul Gareca'
        ])->assign('review-manager');

        $area = factory(App\Area::class)->create([
            'name' => 'local'
        ]);

        Note::create([
            'title' => 'esto es el titulo',
            'note' => 'aqui es la noticia',
            'area_id' => $area->id,
            'reporter_id' => $reporter->id,
            'status' => 2
        ]);

        $this->actingAs($jc)
            ->visit(route('reviewing-notes.index'))
            ->see('Lista de Noticias para Corregir')
            ->see('esto es el titulo')
            ->see($area->name)
            ->see($reporter->name)
            ->click('Editar')
            ->see('Revisando Noticia')
            ->see('esto es el titulo')
            ->see($area->name)
            ->see('aqui es la noticia')
            ->type('cambiando lo que dice la noticia', 'note')
            ->press('Guardar Noticia')
            ->seePageIs(route('reviewing-notes.index'))
            ->press('Enviar a Redacción')
            ->dontSee('Editar')
            ->dontSee('Enviar a Redacción')
            ->seePageIs(route('reviewing-notes.index'))
            ->seeInDatabase('notes', [
               'status' => 3
            ]);
    }
}
