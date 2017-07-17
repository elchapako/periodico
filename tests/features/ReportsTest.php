<?php

use Carbon\Carbon;
use App\Edition;

class ReportsTest extends FeatureTestCase
{
    public function test_own_can_see_pages_status_of_the_active_edition()
    {
        $today = Carbon::now()->format('Y-m-d');
        $editions_number = 6518;

        $first = factory(Edition::class)->create([
            'date' => $today,
            'number_of_edition' => $editions_number,
            'status' => 'active'
        ]);

        $own = $this->adminUser();

        $this->actingAs($own)
            ->visit(route('reports.index'))
            ->see('Reportes');
    }
}
