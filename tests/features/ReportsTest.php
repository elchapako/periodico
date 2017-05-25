<?php

class ReportsTest extends FeatureTestCase
{
    public function test_own_can_see_pages_status_of_the_active_edition()
    {
        $own = $this->adminUser();

        $this->actingAs($own);
            //->visitRoute('reports.index')
            //->see('Reportes');

    }
}
