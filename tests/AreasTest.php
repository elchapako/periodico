<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Area;

class AreasTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function test_areas_list()
    {
        $useradmin = factory(App\User::class)->create([
            'name' => 'Edwin',
            'email' => 'el.chapako@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $useradmin->assign('admin');
        //having
        Area::create(['name' => 'Local']);
        Area::create(['name' => 'Nacional']);

        //when
        $this->actingAs($useradmin)
            ->visit('areas')
            //then
            ->see('Local')
            ->see('Nacional');
    }

    public function test_create_area()
    {
        $useradmin = factory(App\User::class)->create([
            'name' => 'Edwin',
            'email' => 'el.chapako@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $useradmin->assign('admin');

        $this->actingAs($useradmin)
            ->visit('areas')
            ->click('Agregar Area')
            ->seePageIs('areas/create')
            ->see('Agregar Area')
            ->type('Internacional', 'name')
            ->press('Crear Area')
            ->seePageIs('areas')
            ->see('Internacional')
            ->seeInDatabase('areas',[
                'name' => 'Internacional'
            ]);
    }

    public function test_update_area()
    {
        $useradmin = factory(App\User::class)->create([
            'name' => 'Edwin',
            'email' => 'el.chapako@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $useradmin->assign('admin');

        Area::create(['name' => 'local']);

        $this->actingAs($useradmin)
            ->visit('areas')
            ->click('Editar')
            //->seePageIs('areas/1/edit')
            ->see('local')
            ->type('Local-Provincias', 'name')
            ->press('Actualizar Area')
            ->seePageIs('areas')
            ->see('Local-Provincias')
            ->seeInDatabase('areas',[
                'name' => 'Local-Provincias'
            ]);
    }

    public function test_delete_area()
    {
        $useradmin = factory(App\User::class)->create([
            'name' => 'Edwin',
            'email' => 'el.chapako@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $useradmin->assign('admin');

        $area = Area::create(['name' => 'local']);

        $this->actingAs($useradmin)
            ->visit('areas')
            ->press('Eliminar')
            ->seePageIs('areas')
            ->dontSeeInDatabase('areas', [
                'name' => 'local']);
    }

}
