<?php

class CreateSectionTest extends FeatureTestCase
{
    function test_create_sections()
    {
        $useradmin = $this->adminUser();

        $this->actingAs($useradmin)
            ->visit(route('sections.index'))
            ->click('Agregar Seccion')
            ->seePageIs(route('sections.create'))
            ->see('Agregar Seccion')
            ->type('Sociales', 'name')
            ->type('8', 'pages')
            ->press('Crear Seccion')
            ->seePageIs(route('sections.index'))
            ->see('Sociales')
            ->see('8')
            ->seeInDatabase('sections',[
                'name' => 'Sociales',
                'pages' => '8'
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
            ->see('El campo nombre es obligatorio')
            ->see('El campo Páginas es obligatorio');
    }
}