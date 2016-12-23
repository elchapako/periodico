<?php
use App\Client;

class ClientsTest extends FeatureTestCase
{
    function test_clients_list()
    {
        $useradmin = $this->adminUser();
        //having
        Client::create([
            'full_name' => 'Nestor Tapia Rivera',
            'phone' => '66-32525',
            'cellphone' => '71825656',
            'ci' => '5059076',
            'address' => 'Barrio Juan XXIII calle boyan',
            'email' => 'nestor@tapia.com'
        ]);

        //when
        $this->actingAs($useradmin)
            ->visit('clients')
            //then
            ->see('Nestor Tapia Rivera')
            ->see('66-32525')
            ->see('71825656')
            ->see('5059076')
            ->see('Barrio Juan XXIII calle boyan')
            ->see('nestor@tapia.com');
    }

    function test_update_clients()
    {
        $useradmin = $this->adminUser();
        $useradmin->assign('admin');

        Client::create([
            'full_name' => 'Nestor Tapia Rivera',
            'phone' => '6632525',
            'cellphone' => '71825656',
            'ci' => '5059076',
            'address' => 'Barrio Juan XXIII calle boyan',
            'email' => 'nestor@tapia.com'
        ]);

        $this->actingAs($useradmin)
            ->visit('clients')
            ->click('Editar')
            //->seePageIs('clients/1/edit')
            ->see('Nestor Tapia Rivera')
            ->see('6632525')
            ->see('71825656')
            ->see('5059076')
            ->see('Barrio Juan XXIII calle boyan')
            ->see('nestor@tapia.com')
            ->type('Monica Arnal Mendoza', 'full_name')
            ->type('6632525', 'phone')
            ->type('71825656', 'cellphone')
            ->type('5059076', 'ci')
            ->type('Barrio Juan XXIII calle boyana', 'address')
            ->type('monica@arnal.com', 'email')
            ->press('Actualizar Cliente')
            ->seePageIs('clients')
            ->see('Monica Arnal Mendoza')
            ->see('6632525')
            ->see('71825656')
            ->see('5059076')
            ->see('Barrio Juan XXIII calle boyana')
            ->see('monica@arnal.com')
            ->seeInDatabase('clients',[
                'full_name' => 'Monica Arnal Mendoza',
                'phone' => '6632525',
                'cellphone' => '71825656',
                'ci' => '5059076',
                'address' => 'Barrio Juan XXIII calle boyana',
                'email' => 'monica@arnal.com'
            ]);
    }

    function test_delete_client()
    {
        $useradmin = $this->adminUser();

        Client::create([
            'full_name' => 'Nestor Tapia Rivera',
            'phone' => '6632525',
            'cellphone' => '71825656',
            'ci' => '5059076',
            'address' => 'Barrio Juan XXIII calle boyan',
            'email' => 'nestor@tapia.com'
        ]);

        $this->actingAs($useradmin)
            ->visit('clients')
            ->press('Eliminar')
            ->seePageIs('clients')
            ->dontSeeInDatabase('clients',[
                'full_name' => 'Nestor Tapia Rivera',
                'phone' => '6632525',
                'cellphone' => '71825656',
                'ci' => '5059076',
                'address' => 'Barrio Juan XXIII calle boyan',
                'email' => 'nestor@tapia.com'
            ]);
    }
}
