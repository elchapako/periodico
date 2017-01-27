<?php

use Carbon\Carbon;

class EditionTest extends FeatureTestCase
{

    function test_editor_can_create_a_new_edition()
    {
        $editor = $this->defaultUser([
            'name' => 'Edwin Ibañez'
        ])->assign('editor');

        $date = Carbon::tomorrow();
        $editions_number = 8459;

        /*
         *

        $this->actingAs($editor)
            ->visit('editions')
            ->see('Crear Nueva Edición')
            ->press('Crear Edición')
            ->seePageIs('editions')
            ->see('Edición de fecha ' . $date . ' fue creada')
            ->seeInDatabase('editions', [
                'date' => $date,
                'number_of_edition' => $editions_number+1
            ]);
        */
    }

}
