<?php

class EditNotesTest extends FeatureTestCase
{
    public function test_edit_note_assigned_to_reporter()
    {
        $ji = $this->defaultUser([
            'name' => 'Edwin Ibañez'
        ])->assign('info-manager');

        $area= factory(App\Area::class)->create([
            'name' => 'Local'
        ]);

        $reporter = $this->defaultUser([
            'name' => 'Jesus Vargas'
        ])->assign('reporter');

        $this->actingAs($ji);

        $this->visit(route('notes.index'))
            ->click('Agregar Noticia')
            ->seePageIs(route('notes.create'))
            ->see('Agregar Noticia')
            ->type('Lino Condori y la cama en el despacho', 'title')
            ->select($area->id, 'area_id')
            ->select($reporter->id, 'reporter_id')
            ->press('Crear Noticia')
            ->seePageIs(route('notes.index'))
            ->see('Lino Condori y la cama en el despacho')
            ->see($area->name)
            ->see($reporter->name)

            ->seeInDatabase('notes', [
                'title' => 'Lino Condori y la cama en el despacho',
                'area_id' => $area->id,
                'reporter_id' => $reporter->id
            ]);

        // edit note

        $this->actingAs($reporter);
        $this->visit(route('assigned-notes.index'))
            ->see('Lino Condori y la cama en el despacho')
            ->see('Local')
            ->click('Editar')
            ->see('Editar Noticia')
            ->see('Lino Condori y la cama en el despacho')
            ->see('Local')
            ->type('Aqui va toda la noticia', 'note')
            ->press('Guardar Noticia')
            ->seePageIs(route('assigned-notes.index'));

    }
}
