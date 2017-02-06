<?php
use App\Area;

class AreasTest extends FeatureTestCase
{
    function test_areas_list()
    {
        $useradmin = $this->adminUser();
        //having
        Area::create(['name' => 'Local']);
        Area::create(['name' => 'Nacional']);

        //when
        $this->actingAs($useradmin)
            ->visit(route('areas.index'))
            //then
            ->see('Local')
            ->see('Nacional');
    }

    function test_update_area()
    {
        $useradmin = $this->adminUser();

        Area::create(['name' => 'local']);

        $this->actingAs($useradmin)
            ->visit(route('areas.index'))
            ->click('Editar')
            //->seePageIs('areas/1/edit')
            ->see('local')
            ->type('Local-Provincias', 'name')
            ->press('Actualizar Area')
            ->seePageIs(route('areas.index'))
            ->see('Local-Provincias')
            ->seeInDatabase('areas',[
                'name' => 'Local-Provincias'
            ]);
    }

    function test_delete_area()
    {
        $useradmin = $this->adminUser();

        $area = Area::create(['name' => 'local']);

        $this->actingAs($useradmin)
            ->visit(route('areas.index'))
            ->press('Eliminar')
            ->seePageIs(route('areas.index'))
            ->dontSeeInDatabase('areas', [
                'name' => 'local']);
    }

}
