<?php

use App\Edition;

class LastEditionNumberTest extends FeatureTestCase
{
    public function test_get_last_edition_number_without_registers()
    {
        $lastEditionNumber= Edition::getLastEditionNumber();
        $this->assertNotNull($lastEditionNumber);
        $this->assertEquals(config('app.edition_number'), $lastEditionNumber);
    }

    public function test_get_last_edition_number_with_registers()
    {
        factory(App\Edition::class)->create([
           'number_of_edition' => '6536',
        ]);
        $lastEditionNumber = Edition::getLastEditionNumber();
        $this->assertEquals('6536', $lastEditionNumber);
    }
}
