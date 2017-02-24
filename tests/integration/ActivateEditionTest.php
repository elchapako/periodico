<?php

use App\Edition;

class ActivateEditionTest extends FeatureTestCase
{
    public function test_activate_a_edition()
    {
        $edition = factory(App\Edition::class)->create([
            'status' => 'next',
        ]);
        $edition->activate();
        $this->assertEquals('active', $edition->status);
    }
}
