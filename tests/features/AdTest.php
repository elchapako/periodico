<?php
use App\Ad;

class AdTest extends FeatureTestCase
{
    function test_advertising_list()
    {
        $useradmin = $this->adminUser();
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

    function test_advertising_edit()
    {
        $useradmin = $this->adminUser();

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

    function test_advertising_delete()
    {
        $useradmin = $this->adminUser();

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
