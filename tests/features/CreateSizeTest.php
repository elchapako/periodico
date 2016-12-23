<?php

class CreateSizeTest extends FeatureTestCase
{
    function test_create_size()
    {
        $useradmin = $this->adminUser();

        $this->actingAs($useradmin)
            ->visit('sizes')
            ->click('Agregar Tamaño')
            ->seePageIs('sizes/create')
            ->see('Agregar Tamaño')
            ->type('2x4', 'size')
            ->press('Crear Tamaño')
            ->seePageIs('sizes')
            ->see('2x4')
            ->seeInDatabase('sizes',[
                'size' => '2x4'
            ]);
    }

    function test_creating_a_size_requires_authentication()
    {
        $this->visit(route('sizes.create'))
            ->seePageIs(route('login'));
    }

    function test_create_size_form_validation()
    {
        $useradmin = $this->adminUser();

        $this->actingAs($useradmin)
            ->visit(route('sizes.create'))
            ->press('Crear Tamaño')
            ->seePageIs(route('sizes.create'))
            ->see('El campo tamaño es obligatorio');
    }
}