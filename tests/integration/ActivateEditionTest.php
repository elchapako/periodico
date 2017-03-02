<?php

use App\Edition;

class ActivateEditionTest extends FeatureTestCase
{
    public function test_activate_an_edition_with_next_status()
    {
        $edition = factory(App\Edition::class)->create([
            'status' => 'next',
        ]);
        $edition->activate();
        $this->assertEquals('active', $edition->status);
    }

    public function test_activate_an_edition_with_active_status()
    {
        $edition = factory(App\Edition::class)->create([
            'status' => 'active',
        ]);
        $edition->activate();
        $this->assertEquals('active', $edition->status);
    }

    public function test_activate_an_edition_with_done_status()
    {
        $edition = factory(App\Edition::class)->create([
            'status' => 'done',
        ]);
        $edition->activate();
        $this->assertEquals('done', $edition->status);
    }

}
