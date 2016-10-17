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
}
