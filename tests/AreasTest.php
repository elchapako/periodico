<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Area;

class AreasTest extends TestCase
{

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
            ->see('Create an area')
            ->type('Internacional', 'name')
            ->press('Create area')
            ->seePageIs('areas')
            ->see('Internacional')
            ->seeInDatabase('areas',[
                'name' => 'Internacional'
            ]);
    }
}
