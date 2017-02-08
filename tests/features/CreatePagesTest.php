<?php

class CreatePagesTest extends FeatureTestCase
{
    function test_boss_can_create_a_page()
    {
        $ji = $this->defaultUser([
            'name' => 'Edwin Ibañez'
        ])->assign('info-manager');

        $area= factory(App\Area::class)->create([
            'name' => 'Local'
        ]);

        $section= factory(App\Section::class)->create([
            'name' => 'Edicion Central'
        ]);

        $this->actingAs($ji)
            ->visit(route('pages.index'))
            ->click('Agregar Página')
            ->seePageIs(route('pages.create'))
            ->see('Crear Página')
            ->select($area->id, 'area_id')
            ->select($section->id, 'section_id')
            ->press('Crear Página')
            ->seePageIs(route('pages.index'))
            ->see($area->name)
            ->see($section->name)

            ->seeInDatabase('pages', [
               'area_id' => $area->id,
               'section_id' => $section->id
            ]);
    }
}
