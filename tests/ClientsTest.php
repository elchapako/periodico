<?php

use App\Client;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientsTest extends TestCase
{

    use DatabaseMigrations;

    public function test_clients_list()
    {
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
        $this->visit('clients')
            //then
            ->see('Nestor Tapia Rivera')
            ->see('66-32525')
            ->see('71825656')
            ->see('5059076')
            ->see('Barrio Juan XXIII calle boyan')
            ->see('nestor@tapia.com');
    }

    public function test_create_clients()
    {
        $this->visit('clients')
            ->click('Add a client')
            ->seePageIs('clients/create')
            ->see('Create client')
            ->type('Nestor Tapia Rivera', 'full_name')
            ->type('6632525', 'phone')
            ->type('71825656', 'cellphone')
            ->type('5059076', 'ci')
            ->type('Barrio Juan XXIII calle boyan', 'address')
            ->type('nestor@tapia.com', 'email')
            ->press('Create client')
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

    public function test_update_clients()
    {
        Client::create([
            'full_name' => 'Nestor Tapia Rivera',
            'phone' => '6632525',
            'cellphone' => '71825656',
            'ci' => '5059076',
            'address' => 'Barrio Juan XXIII calle boyan',
            'email' => 'nestor@tapia.com'
        ]);

        $this->visit('clients')
            ->click('Edit')
            ->seePageIs('clients/1/edit')
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
            ->press('Update client')
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

    public function test_delete_client()
    {
        Client::create([
            'full_name' => 'Nestor Tapia Rivera',
            'phone' => '6632525',
            'cellphone' => '71825656',
            'ci' => '5059076',
            'address' => 'Barrio Juan XXIII calle boyan',
            'email' => 'nestor@tapia.com'
        ]);

        $this->visit('clients')
            ->press('Delete')
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
