<?php

use App\Note;

class NotesTest extends FeatureTestCase
{
    function test_notes_list()
    {
        $ji = $this->defaultUser([
            'name' => 'Edwin Ibañez'
        ])->assign('info-manager');

        $area= factory(App\Area::class)->create([
            'name' => 'Local'
        ]);

        $reporter = factory(App\User::class)->create([
            'name' => 'Jesus Vargas'
        ])->assign('reporter');

        $this->actingAs($ji);

        Note::create([
            'title' => 'Lino Condori y la cama en su despacho',
            'area_id' => $area->id,
            'reporter_id' => $reporter->id,
        ]);

        //when
        $this->actingAs($ji)
            ->visit('notes')
            //then
            ->see('Lino Condori y la cama en su despacho')
            ->see('Local')
            ->see('Jesus Vargas');
    }
}