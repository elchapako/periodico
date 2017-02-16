<?php
use App\SectionName;

class SectionTest extends FeatureTestCase
{
    function test_sections_list()
    {
        $useradmin = $this->adminUser();
        //having
            SectionName::create(['name' => 'Cronica']);
            SectionName::create(['name' => 'Deportivo']);
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

        SectionName::create(['name' => 'Cronica']);

        $this->actingAs($useradmin)
            ->visit(route('sections.index'))
            ->click('Editar')
            //->seePageIs('sections/1/edit')
            ->see('Cronica')
            ->type('Deportivo', 'name')
            ->press('Actualizar Seccion')
            ->seePageIs(route('sections.index'))
            ->see('Deportivo')
            ->seeInDatabase('section_names',[
                'name' => 'Deportivo'
            ]);
    }

    function test_delete_section()
    {
        $useradmin = $this->adminUser();

        SectionName::create(['name' => 'Deportivo']);

        $this->actingAs($useradmin)
            ->visit(route('sections.index'))
            ->press('Eliminar')
            ->seePageIs(route('sections.index'))
            ->dontSeeInDatabase('section_names', [
                'name' => 'Deportivo']);
    }

}
