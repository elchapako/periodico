<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Area;

class AreasTest extends TestCase
{
    use DatabaseMigrations;

    public function test_areas_list()
    {
        //having
        Area::create(['name' => 'Local']);
        Area::create(['name' => 'Nacional']);

        //when
        $this->visit('areas')
            //then
            ->see('Local')
            ->see('Nacional');
    }

    public function test_create_area()
    {
        $this->visit('areas')
            ->click('Add an area')
            ->seePageIs('areas/create')
            ->see('Create area')
            ->type('Internacional', 'name')
            ->press('Create area')
            ->seePageIs('areas')
            ->see('Internacional')
            ->seeInDatabase('areas',[
                'name' => 'Internacional'
            ]);
    }

    public function test_update_area()
    {
        Area::create(['name' => 'local']);

        $this->visit('areas')
            ->click('Edit')
            ->seePageIs('areas/1/edit')
            ->see('local')
            ->type('Local-Provincias', 'name')
            ->press('Update area')
            ->seePageIs('areas')
            ->see('Local-Provincias')
            ->seeInDatabase('areas',[
                'name' => 'Local-Provincias'
            ]);
    }

    public function test_delete_area()
    {
        $area = Area::create(['name' => 'local']);

        $this->visit('areas')
            ->press('Delete')
            ->seePageIs('areas')
            ->dontSeeInDatabase('areas', [
                'name' => $area->name]);
    }

}
