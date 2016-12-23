<?php

class CreateAdTest extends FeatureTestCase
{
    function test_a_user_create_an_advertising()
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

    function test_creating_an_advertising_requires_authentication()
    {
        $this->visit(route('ads.create'))
            ->seePageIs(route('login'));
    }

    function test_create_advertising_form_validation()
    {
        $useradmin = $this->adminUser();

        $this->actingAs($useradmin)
            ->visit(route('ads.create'))
            ->press('Crear publicidad')
            ->seePageIs(route('ads.create'))
            ->see('El campo nombre es obligatorio');
    }
}