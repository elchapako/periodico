<?php

use App\Note;

class SendNoteToCorrectionTest extends FeatureTestCase
{
    public function test_reporter_send_note_to_correction()
    {
        $reporter = $this->defaultUser([
            'name' => 'Jesus Vargas'
        ])->assign('reporter');

        $area = factory(App\Area::class)->create([
           'name' => 'local'
        ]);

        Note::create([
            'title' => 'esto es el titulo',
            'note' => 'aqui es la noticia',
            'area_id' => $area->id,
            'reporter_id' => $reporter->id,
            'status' => 1
        ]);

        // edit note

        $this->actingAs($reporter);
        $this->visit(route('assigned-notes.index'))
            ->see('esto es el titulo')
            ->see('local')
            ->see('Editar')
            ->press('Enviar a Corrección')
            ->seePageIs(route('assigned-notes.index'))
            ->seeInDatabase('notes', [
               'status' => 2
            ]);


    }
}
