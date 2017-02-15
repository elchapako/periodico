<?php

use Carbon\Carbon;

class CreateEditionTest extends FeatureTestCase
{

    function test_editor_can_create_a_new_edition()
    {
        $editor = $this->defaultUser([
            'name' => 'Edwin Ibañez'
        ])->assign('editor');

        $date = Carbon::now();
        $editions_number = 8459;

        factory(App\Edition::class)->create([
            'date' => $date,
            'number_of_edition' => $editions_number,
            'status' => 'active'
        ]);

        $date = Carbon::tomorrow();

        $this->actingAs($editor)
            ->visit(route('editions.index'))
            ->see('Lista de Ediciones')
            ->press('Crear Edicion')
            ->seePageIs(route('editions.index'))
            ->see('Edición de fecha ' . $date . ' fue creada')
            ->seeInDatabase('editions', [
                'date' => $date,
                'number_of_edition' => $editions_number+1
            ]);

    }

}
