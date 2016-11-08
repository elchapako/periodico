<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Section;

class SectionTest extends TestCase
{
    use DatabaseMigrations, WithoutMiddleware;

    public function test_sections_list()
    {
        //having
            Section::create(['name' => 'Cronica']);
            Section::create(['name' => 'Deportivo']);
	    //when
	        $this->visit('sections')
	    //then
            ->see('Cronica')
            ->see('Deportivo');
    }

    public function test_create_sections()
    {
        $this->visit('sections')
            ->click('Add a section')
            ->seePageIs('sections/create')
            ->see('Create section')
            ->type('Sociales', 'name')
            ->press('Create section')
            ->seePageIs('sections')
            ->see('Sociales')
            ->seeInDatabase('sections',[
                'name' => 'Sociales'
            ]);
    }

    public function test_update_sections()
    {
        Section::create(['name' => 'Cronica']);

        $this->visit('sections')
            ->click('Edit')
            ->seePageIs('sections/1/edit')
            ->see('Cronica')
            ->type('Deportivo', 'name')
            ->press('Update section')
            ->seePageIs('sections')
            ->see('Deportivo')
            ->seeInDatabase('sections',[
                'name' => 'Deportivo'
            ]);
    }

    public function test_delete_section()
    {
        $section = Section::create(['name' => 'Deportivo']);

        $this->visit('sections')
            ->press('Delete')
            ->seePageIs('sections')
            ->dontSeeInDatabase('sections', [
                'name' => $section->name]);
    }

}
