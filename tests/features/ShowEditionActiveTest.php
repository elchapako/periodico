<?php

use App\Edition;
use Carbon\Carbon;

class ShowEditionActiveTest extends FeatureTestCase
{
    public function test_user_can_see_edition_active_in_menu()
    {
        $user = $this->defaultUser([
            'name' => 'Edwin Ibañez'
        ]);

        $first = factory(Edition::class)->create([
            'date' => Carbon::today(),
            'number_of_edition' => '6568',
            'status' => 'in-progress'
        ]);

        $this->actingAs($user)
            ->visit('/')
            ->see($first->publish_date);
    }
}
