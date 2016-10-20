<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Size;

class SizesTest extends TestCase
{
    use DatabaseTransactions;

    public function test_sizes_list()
    {
        //having
        Size::create(['size' => '1/4']);
        Size::create(['size' => '3x4']);

        //when
        $this->visit('sizes')
            //then
            ->see('1/4')
            ->see('3x4');
    }

    public function test_create_size()
    {
        $this->visit('sizes')
            ->click('Add size')
            ->seePageIs('sizes/create')
            ->see('Create size')
            ->type('2x4', 'size')
            ->press('Create size')
            ->seePageIs('sizes')
            ->see('2x4')
            ->seeInDatabase('sizes',[
                'size' => '2x4'
            ]);
    }

    public function test_update_size()
    {
        Size::create(['size' => '3x4']);

        $this->visit('sizes')
            ->click('Edit')
            ->seePageIs('sizes/1/edit')
            ->see('3x4')
            ->type('1/4', 'size')
            ->press('Update size')
            ->seePageIs('sizes')
            ->see('1/4')
            ->seeInDatabase('sizes',[
                'size' => '1/4'
            ]);
    }

    public function test_delete_size()
    {
        $size = Size::create(['size' => '1/2']);

        $this->visit('sizes')
            ->press('Delete')
            ->seePageIs('sizes')
            ->dontSeeInDatabase('sizes', [
                'size' => $size->size]);
    }
}
