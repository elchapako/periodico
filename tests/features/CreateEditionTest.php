<?php

use Carbon\Carbon;

class CreateEditionTest extends FeatureTestCase
{

    function test_editor_can_create_a_new_edition()
    {
        $editor = $this->defaultUser([
            'name' => 'Edwin Ibañez'
        ])->assign('editor');

        $date = Carbon::now(-4);
        $editions_number = 8459;

        factory(App\Edition::class)->create([
            'date' => $date,
            'number_of_edition' => $editions_number
        ]);

        $date = Carbon::tomorrow(-4);

        $this->actingAs($editor)
            ->visit('editions')
            ->see('Lista de Ediciones')
            ->press('Crear Edición')
            ->seePageIs('editions')
            ->see('Edición de fecha ' . $date . ' fue creada')
            ->seeInDatabase('editions', [
                'date' => $date,
                'number_of_edition' => $editions_number+1
            ]);

    }

}
