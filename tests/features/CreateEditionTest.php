<?php

use App\Edition;
use Carbon\Carbon;

class CreateEditionTest extends FeatureTestCase
{

    function test_editor_can_create_a_new_edition()
    {
        $editor = $this->defaultUser([
            'name' => 'Edwin Ibañez'
        ])->assign('editor');

        $date = Carbon::now()->format('Y-m-d');
        $editions_number = 8459;

        factory(App\Edition::class)->create([
            'date' => $date,
            'number_of_edition' => $editions_number,
            'status' => 'active'
        ]);

        $this->actingAs($editor)
            ->visit(route('editions.index'))
            ->see('Lista de Ediciones')
            ->press('Crear Edicion')
            ->seePageIs(route('editions.index'));

        $last = Edition::latest()->first();

        //$this->see('Edicion de fecha ' . $last->publish_date . ' fue creada')
        $this->seeInDatabase('editions', [
                'date' => $last->date,
                'number_of_edition' => $last->number_of_edition
            ]);

    }

}
