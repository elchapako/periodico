<?php

class CreateAreaTest extends FeatureTestCase
{
    function test_create_area()
    {
        $useradmin = $this->adminUser();

        $this->actingAs($useradmin)
            ->visit(route('areas.index'))
            ->click('Agregar Area')
            ->seePageIs(route('areas.create'))
            ->see('Agregar Area')
            ->type('Internacional', 'name')
            ->press('Crear Area')
            ->seePageIs(route('areas.index'))
            ->see('Internacional')
            ->seeInDatabase('areas',[
                'name' => 'Internacional'
            ]);
    }

    function test_creating_an_area_requires_authentication()
    {
        $this->visit(route('areas.create'))
            ->seePageIs(route('login'));
    }

    function test_create_area_form_validation()
    {
        $useradmin = $this->adminUser();

        $this->actingAs($useradmin)
            ->visit(route('areas.create'))
            ->press('Crear Area')
            ->seePageIs(route('areas.create'))
            ->see('El campo nombre es obligatorio');
    }

}