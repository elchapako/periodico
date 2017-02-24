<?php
use App\Section;

class SectionTest extends FeatureTestCase
{
    function test_sections_list()
    {
        $useradmin = $this->adminUser();
        //having
            Section::create(['name' => 'Cronica']);
            Section::create(['name' => 'Deportivo']);
	    //when
	        $this->actingAs($useradmin)
            ->visit(route('sections.index'))
	    //then
            ->see('Cronica')
            ->see('Deportivo');
    }

    function test_update_sections()
    {
        $useradmin = $this->adminUser();

        Section::create(['name' => 'Cronica']);

        $this->actingAs($useradmin)
            ->visit(route('sections.index'))
            ->click('Editar')
            //->seePageIs('sections/1/edit')
            ->see('Cronica')
            ->type('Deportivo', 'name')
            ->press('Actualizar Seccion')
            ->seePageIs(route('sections.index'))
            ->see('Deportivo')
            ->seeInDatabase('sections',[
                'name' => 'Deportivo'
            ]);
    }

    function test_delete_section()
    {
        $useradmin = $this->adminUser();

        Section::create(['name' => 'Deportivo']);

        $this->actingAs($useradmin)
            ->visit(route('sections.index'))
            ->press('Eliminar')
            ->seePageIs(route('sections.index'))
            ->dontSeeInDatabase('sections', [
                'name' => 'Deportivo']);
    }

}
