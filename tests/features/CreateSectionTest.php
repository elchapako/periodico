<?php

class CreateSectionTest extends FeatureTestCase
{
    function test_create_sections()
    {
        $useradmin = $this->adminUser();

        $this->actingAs($useradmin)
            ->visit('sections')
            ->click('Agregar Seccion')
            ->seePageIs('sections/create')
            ->see('Agregar Seccion')
            ->type('Sociales', 'name')
            ->press('Crear Seccion')
            ->seePageIs('sections')
            ->see('Sociales')
            ->seeInDatabase('sections',[
                'name' => 'Sociales'
            ]);
    }

    function test_creating_a_section_requires_authentication()
    {
        $this->visit(route('sections.create'))
            ->seePageIs(route('login'));
    }

    function test_create_section_form_validation()
    {
        $useradmin = $this->adminUser();

        $this->actingAs($useradmin)
            ->visit(route('sections.create'))
            ->press('Crear Seccion')
            ->seePageIs(route('sections.create'))
            ->see('El campo nombre es obligatorio');
    }
}