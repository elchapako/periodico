<?php

use App\Edition;
use Carbon\Carbon;

class LastDateTest extends FeatureTestCase
{
    public function test_get_last_date_without_registers()
    {
        $lastDate = Edition::getLastDate();
        $this->assertNotNull($lastDate);
        $this->assertEquals(Carbon::today(), $lastDate);
    }

    public function test_get_last_date_with_registers()
    {
        $edition = Edition::createNextEdition();
        $lastDate = Edition::getLastDate();
        $this->assertEquals($edition->date, $lastDate);
    }
}
