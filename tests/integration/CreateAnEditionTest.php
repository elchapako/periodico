<?php

use App\Edition;

class CreateAnEditionTest extends FeatureTestCase
{
    public function test_create_new_edition()
    {
        $edition = Edition::createNextEdition();

        $this->seeInDatabase('editions', [
           'date' => $edition->date,
           'number_of_edition' => $edition->number_of_edition,
           'status' => 'active'
        ]);
    }
}
