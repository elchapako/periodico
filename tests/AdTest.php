<?php

use App\Ad;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class AdTest extends TestCase
{
    use DatabaseTransactions;

    public function test_advertising_list()
    {
        $useradmin = factory(App\User::class)->create([
            'name' => 'Edwin',
            'email' => 'el.chapako@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $useradmin->assign('admin');
        //having
        $c=factory(App\Client::class)->create([
            'full_name' => 'Gobernacion Tarija'
        ]);
        $s=factory(App\Size::class)->create([
            'size' => '1/4'
        ]);
        $sec=factory(App\Section::class)->create([
            'name' => 'Edicion Central'
        ]);

        Ad::create([
            'name' => 'Juancito Pinto',
            'color' => 'Full Color',
            'client_id' => $c->id,
            'section_id' => $sec->id,
            'size_id' => $s->id
        ]);


        //when
        $this->actingAs($useradmin)
            ->visit('ads')
            //then
            ->see('Juancito Pinto')
            ->see('Full Color')
            ->see('Edicion Central')
            ->see('1/4')
            ->see('Gobernacion Tarija');

    }

    public function test_advertising_create()
    {
        $useradmin = factory(App\User::class)->create([
            'name' => 'Edwin',
            'email' => 'el.chapako@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $useradmin->assign('admin');

        $c=factory(App\Client::class)->create([
            'full_name' => 'Gobernacion Tarija'
        ]);
        $s=factory(App\Size::class)->create([
            'size' => '1/4'
        ]);
        $sec=factory(App\Section::class)->create([
            'name' => 'Edicion Central'
        ]);

        $this->actingAs($useradmin)
            ->visit('ads')
            ->click('Agregar Publicidad')
            ->seePageIs('ads/create')
            ->see('Agregar publicidad')
            ->type('Juancito Pinto', 'name')
            ->select('Full Color', 'color')
            ->select($sec->id, 'section_id')
            ->select($s->id, 'size_id')
            ->select($c->id, 'client_id')
            ->press('Crear publicidad')
            ->seePageIs('ads')
            ->see('Juancito Pinto')
            ->see('Full Color')
            ->see('Edicion Central')
            ->see('1/4')
            ->see('Gobernacion Tarija')
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
        $useradmin = factory(App\User::class)->create([
            'name' => 'Edwin',
            'email' => 'el.chapako@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $useradmin->assign('admin');

        $c=factory(App\Client::class)->create([
            'full_name' => 'Gobernacion Tarija'
        ]);
        $s=factory(App\Size::class)->create([
            'size' => '1/4'
        ]);
        $sec=factory(App\Section::class)->create([
            'name' => 'Edicion Central'
        ]);

        Ad::create([
            'name' => 'Juancito Pinto',
            'color' => 'Full Color',
            'client_id' => $c->id,
            'section_id' => $sec->id,
            'size_id' => $s->id
        ]);

        $this->actingAs($useradmin)
            ->visit('ads')
            ->click('Editar')
            //->seePageIs('ads/1/edit')
            ->see('Editar publicidad')
            ->type('Ministerio de Economia', 'name')
            ->select('B&W', 'color')
            ->select($sec->id, 'section_id')
            ->select($s->id, 'size_id')
            ->select($c->id, 'client_id')
            ->press('Actualizar publicidad')
            ->seePageIs('ads')
            ->see('Ministerio de Economia')
            ->see('B&W')
            ->see('Edicion Central')
            ->see('1/4')
            ->see('Gobernacion Tarija')
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
        $useradmin = factory(App\User::class)->create([
            'name' => 'Edwin',
            'email' => 'el.chapako@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $useradmin->assign('admin');

        $c=factory(App\Client::class)->create([
            'full_name' => 'Gobernacion Tarija'
        ]);
        $s=factory(App\Size::class)->create([
            'size' => '1/4'
        ]);
        $sec=factory(App\Section::class)->create([
            'name' => 'Edicion Central'
        ]);

        Ad::create([
            'name' => 'Juancito Pinto',
            'color' => 'Full Color',
            'client_id' => $c->id,
            'section_id' => $sec->id,
            'size_id' => $s->id
        ]);

        $this->actingAs($useradmin)
            ->visit('ads')
            ->press('Eliminar')
            ->seePageIs('ads')
            ->dontSeeInDatabase('ads', [
                'name' => 'Juancito Pinto']);
    }
}
