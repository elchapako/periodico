<?php
use App\Section;

class SectionTest extends FeatureTestCase
{
    function test_sections_list()
    {
        $useradmin = $this->adminUser();
        //having
        $sec1 = Section::create([
                'name' => 'Cronica',
                'pages' => 8,
                'isRegular' => true
            ]);
        $sec2 = Section::create([
                'name' => 'Deportivo',
                'pages' => 8,
                'isRegular' => false
            ]);
	    //when
	        $this->actingAs($useradmin)
            ->visit(route('sections.index'))
	    //then
            ->see($sec1->name)
            ->see($sec1->pages)
            ->see('si')
            ->see($sec2->name)
            ->see($sec2->pages)
            ->see('no');
    }

    function test_update_sections()
    {
        $useradmin = $this->adminUser();

        Section::create([
            'name' => 'Cronica',
            'pages' => 8,
            'isRegular' => true
        ]);

        $this->actingAs($useradmin)
            ->visit(route('sections.index'))
            ->click('Editar')
            //->seePageIs('sections/1/edit')
            ->see('Cronica')
            ->type('Deportivo', 'name')
            ->see('8')
            ->type('12', 'pages')
            ->see('si')
            ->select('0', 'isRegular')
            ->press('Actualizar Seccion')
            ->seePageIs(route('sections.index'))
            ->see('Deportivo')
            ->see('12')
            ->see('no')
            ->seeInDatabase('sections',[
                'name' => 'Deportivo',
                'pages' => '12',
                'isRegular' => '0'
            ]);
    }

    function test_delete_section()
    {
        $useradmin = $this->adminUser();

        Section::create([
            'name' => 'Deportivo',
            'pages' => 8,
            'isRegular' => true
        ]);

        $this->actingAs($useradmin)
            ->visit(route('sections.index'))
            ->press('Eliminar')
            ->seePageIs(route('sections.index'))
            ->dontSeeInDatabase('sections', [
                'name' => 'Deportivo',
                'pages' => '8',
                'isRegular' => '0'
            ]);
    }

}
