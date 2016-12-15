<?php
use App\Section;

class SectionTest extends FeatureTestCase
{
    function test_sections_list()
    {
        $useradmin = $this->defaultUser();
        //having
            Section::create(['name' => 'Cronica']);
            Section::create(['name' => 'Deportivo']);
	    //when
	        $this->actingAs($useradmin)
            ->visit('sections')
	    //then
            ->see('Cronica')
            ->see('Deportivo');
    }

    function test_create_sections()
    {
        $useradmin = $this->defaultUser();

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

    function test_update_sections()
    {
        $useradmin = $this->defaultUser();

        Section::create(['name' => 'Cronica']);

        $this->actingAs($useradmin)
            ->visit('sections')
            ->click('Editar')
            //->seePageIs('sections/1/edit')
            ->see('Cronica')
            ->type('Deportivo', 'name')
            ->press('Actualizar Seccion')
            ->seePageIs('sections')
            ->see('Deportivo')
            ->seeInDatabase('sections',[
                'name' => 'Deportivo'
            ]);
    }

    function test_delete_section()
    {
        $useradmin = $this->defaultUser();

        Section::create(['name' => 'Deportivo']);

        $this->actingAs($useradmin)
            ->visit('sections')
            ->press('Eliminar')
            ->seePageIs('sections')
            ->dontSeeInDatabase('sections', [
                'name' => 'Deportivo']);
    }

}
