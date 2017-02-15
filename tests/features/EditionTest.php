<?php

use Carbon\Carbon;

class EditionTest extends FeatureTestCase
{
    public function test_list_of_edition()
    {
        $today = Carbon::now()->format('Y-m-d');
        $editions_number = 6518;

        $first = factory(App\Edition::class)->create([
            'date' => $today,
            'number_of_edition' => $editions_number,
            'status' => 'in-progress'
        ]);

        $tomorrow = Carbon::tomorrow()->format('Y-m-d');

        $second = factory(App\Edition::class)->create([
           'date' => $tomorrow,
           'number_of_edition' => $editions_number+1,
           'status' => 'active'
        ]);

        $editor = $this->defaultUser([
            'name' => 'Edwin Ibañez'
        ])->assign('editor');

        $this->actingAs($editor)
            ->visit(route('editions.index'))
            ->see($first->date)
            ->see($first->number_of_edition)
            ->see($first->status)
            ->see($second->date)
            ->see($second->editions_number)
            ->see($second->status);

    }
}
