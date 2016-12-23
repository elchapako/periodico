<?php

use App\Size;

class SizesTest extends FeatureTestCase
{
    function test_sizes_list()
    {
        $useradmin = $this->adminUser();
        //having
        Size::create(['size' => '1/4']);
        Size::create(['size' => '3x4']);

        //when
        $this->actingAs($useradmin)
            ->visit('sizes')
            //then
            ->see('1/4')
            ->see('3x4');
    }

    function test_update_size()
    {
        $useradmin = $this->adminUser();

        Size::create(['size' => '3x4']);

        $this->actingAs($useradmin)
            ->visit('sizes')
            ->click('Editar')
            //->seePageIs('sizes/1/edit')
            ->see('3x4')
            ->type('1/4', 'size')
            ->press('Actualizar Tamaño')
            ->seePageIs('sizes')
            ->see('1/4')
            ->seeInDatabase('sizes',[
                'size' => '1/4'
            ]);
    }

    function test_delete_size()
    {
        $useradmin = $this->adminUser();

        Size::create(['size' => '1/2']);

        $this->actingAs($useradmin)
            ->visit('sizes')
            ->press('Eliminar')
            ->seePageIs('sizes')
            ->dontSeeInDatabase('sizes', [
                'size' => '1/2']);
    }
}
