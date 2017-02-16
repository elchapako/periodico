<?php

use App\Edition;

class CreateAnEditionTest extends FeatureTestCase
{
    public function test_create_new_edition()
    {
        Edition::createEdition();
        $date = Edition::getLastDate();
        $this->assertEquals(Carbon\Carbon::tomorrow(), $date);
    }
}
