<?php

class CreateClientTest extends FeatureTestCase
{
    function test_create_clients()
    {
        $useradmin = $this->adminUser();

        $this->actingAs($useradmin)
            ->visit('clients')
            ->click('Agregar Cliente')
            ->seePageIs('clients/create')
            ->see('Agregar Cliente')
            ->type('Nestor Tapia Rivera', 'full_name')
            ->type('6632525', 'phone')
            ->type('71825656', 'cellphone')
            ->type('5059076', 'ci')
            ->type('Barrio Juan XXIII calle boyan', 'address')
            ->type('nestor@tapia.com', 'email')
            ->press('Crear Cliente')
            ->seePageIs('clients')
            ->see('Nestor Tapia Rivera')
            ->see('6632525')
            ->see('71825656')
            ->see('5059076')
            ->see('Barrio Juan XXIII calle boyan')
            ->see('nestor@tapia.com')
            ->seeInDatabase('clients',[
                'full_name' => 'Nestor Tapia Rivera',
                'phone' => '6632525',
                'cellphone' => '71825656',
                'ci' => '5059076',
                'address' => 'Barrio Juan XXIII calle boyan',
                'email' => 'nestor@tapia.com'
            ]);
    }

    function test_creating_a_client_requires_authentication()
    {
        $this->visit(route('clients.create'))
            ->seePageIs(route('login'));
    }

    function test_create_client_form_validation()
    {
        $useradmin = $this->adminUser();

        $this->actingAs($useradmin)
            ->visit(route('clients.create'))
            ->press('Crear Cliente')
            ->seePageIs(route('clients.create'))
            ->see('El campo nombre completo es obligatorio')
            ->see('El campo teléfono es obligatorio')
            ->see('El campo celular es obligatorio')
            ->see('El campo carnet de identidad es obligatorio')
            ->see('El campo dirección es obligatorio')
            ->see('El campo correo electrónico es obligatorio');
    }
}