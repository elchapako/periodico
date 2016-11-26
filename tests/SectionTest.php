<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Section;

class SectionTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function test_sections_list()
    {
        $useradmin = factory(App\User::class)->create([
            'name' => 'Edwin',
            'email' => 'el.chapako@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $useradmin->assign('admin');

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

    public function test_create_sections()
    {
        $useradmin = factory(App\User::class)->create([
            'name' => 'Edwin',
            'email' => 'el.chapako@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $useradmin->assign('admin');

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

    public function test_update_sections()
    {
        $useradmin = factory(App\User::class)->create([
            'name' => 'Edwin',
            'email' => 'el.chapako@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $useradmin->assign('admin');

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

    public function test_delete_section()
    {
        $useradmin = factory(App\User::class)->create([
            'name' => 'Edwin',
            'email' => 'el.chapako@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $useradmin->assign('admin');

        $section = Section::create(['name' => 'Deportivo']);

        $this->actingAs($useradmin)
            ->visit('sections')
            ->press('Eliminar')
            ->seePageIs('sections')
            ->dontSeeInDatabase('sections', [
                'name' => 'Deportivo']);
    }

}
