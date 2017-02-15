<?php

use Carbon\Carbon;
use App\Edition;

class EditionTest extends FeatureTestCase
{
    public function test_list_of_edition()
    {
        $today = Carbon::now()->format('Y-m-d');
        $editions_number = 6518;

        $first = factory(Edition::class)->create([
            'date' => $today,
            'number_of_edition' => $editions_number,
            'status' => 'in-progress'
        ]);

        $tomorrow = Carbon::tomorrow()->format('Y-m-d');

        $second = factory(Edition::class)->create([
           'date' => $tomorrow,
           'number_of_edition' => $editions_number+1,
           'status' => 'active'
        ]);

        $editor = $this->defaultUser([
            'name' => 'Edwin Ibañez'
        ])->assign('editor');

        $this->actingAs($editor)
            ->visit(route('editions.index'))
            ->see($first->publish_date)
            ->see($first->number_of_edition)
            ->see($first->status)
            ->see($second->publish_date)
            ->see($second->editions_number)
            ->see($second->status);

    }
}
