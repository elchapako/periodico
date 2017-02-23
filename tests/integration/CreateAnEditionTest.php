<?php

use App\Edition;

class CreateAnEditionTest extends FeatureTestCase
{
    public function test_create_new_edition()
    {
        Edition::createNextEdition();
        $edition = Edition::latest()->first();
        $this->seeInDatabase('editions', [
           'date' => $edition->date,
           'number_of_edition' => $edition->number_of_edition,
           'status' => $edition->status
        ]);
    }
}
