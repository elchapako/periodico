<?php

use App\Ad;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class AdTest extends TestCase
{
    use DatabaseMigrations;

    public function test_advertising_list()
    {
        //having
        $c=factory(App\Client::class)->create();
        $s=factory(App\Size::class)->create();
        $sec=factory(App\Section::class)->create();

        Ad::create([
            'name' => 'Juancito Pinto',
            'color' => 'Full Color',
            'client_id' => $c->id,
            'section_id' => $sec->id,
            'size_id' => $s->id
        ]);


        //when
        $this->visit('ads')
            //then
            ->see('Juancito Pinto')
            ->see('Full Color')
            ->see($sec->name)
            ->see($s->size)
            ->see($c->full_name);

    }

    public function test_advertising_create()
    {
        $c=factory(App\Client::class)->create();
        $s=factory(App\Size::class)->create();
        $sec=factory(App\Section::class)->create();

        $this->visit('ads')
            ->click('Add ad')
            ->seePageIs('ads/create')
            ->see('Create ad')
            ->type('Juancito Pinto', 'name')
            ->select('Full Color', 'color')
            ->select($sec->id, 'section_id')
            ->select($s->id, 'size_id')
            ->select($c->id, 'client_id')
            ->press('Create ad')
            ->seePageIs('ads')
            ->see('Juancito Pinto')
            ->see('Full Color')
            ->see($sec->name)
            ->see($s->size)
            ->see($c->full_name)
            ->seeInDatabase('ads',[
                'name' => 'Juancito Pinto',
                'color' => 'Full color',
                'section_id' => $sec->id,
                'size_id' => $s->id,
                'client_id' => $c->id
            ]);
    }

    public function test_advertising_edit()
    {
        $c=factory(App\Client::class)->create();
        $s=factory(App\Size::class)->create();
        $sec=factory(App\Section::class)->create();

        Ad::create([
            'name' => 'Juancito Pinto',
            'color' => 'Full Color',
            'client_id' => $c->id,
            'section_id' => $sec->id,
            'size_id' => $s->id
        ]);

        $this->visit('ads')
            ->click('Edit')
            ->seePageIs('ads/1/edit')
            ->see('Edit ad')
            ->type('Ministerio de Economia', 'name')
            ->select('B&W', 'color')
            ->select($sec->id, 'section_id')
            ->select($s->id, 'size_id')
            ->select($c->id, 'client_id')
            ->press('Update ad')
            ->seePageIs('ads')
            ->see('Ministerio de Economia')
            ->see('B&W')
            ->see($sec->name)
            ->see($s->size)
            ->see($c->full_name)
            ->seeInDatabase('ads',[
                'name' => 'Ministerio de Economia',
                'color' => 'B&W',
                'section_id' => $sec->id,
                'size_id' => $s->id,
                'client_id' => $c->id
            ]);
    }

    public function test_advertising_delete()
    {
        $c=factory(App\Client::class)->create();
        $s=factory(App\Size::class)->create();
        $sec=factory(App\Section::class)->create();

        Ad::create([
            'name' => 'Juancito Pinto',
            'color' => 'Full Color',
            'client_id' => $c->id,
            'section_id' => $sec->id,
            'size_id' => $s->id
        ]);

        $this->visit('ads')
            ->press('Delete')
            ->seePageIs('ads')
            ->dontSeeInDatabase('ads', [
                'name' => 'Juancito Pinto']);
    }
}
