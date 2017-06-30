<?php

use App\Date;
use App\Edition;
use Carbon\Carbon;

class ShowAdsToActiveEditionTest extends FeatureTestCase
{
    public function test_show_list_of_ads_for_active_edition()
    {
        $editor = $this->defaultUser([
            'name' => 'Jorge Quiros'
        ])->assign('admin');

        $date = Carbon::now()->format('Y-m-d');
        $editions_number = 8459;

        factory(App\Edition::class)->create([
            'date' => $date,
            'number_of_edition' => $editions_number,
            'status' => 'active'
        ]);

        $ad1=factory(App\Ad::class)->create([
            'name' => 'publicidad1',
            'color' => 'Full Color',
        ]);

        $date1= Date::create([
            'dates' => Carbon::now()
        ]);
        $ad1->dates()->save($date1);

        $ad2=factory(App\Ad::class)->create([
            'name' => 'publicidad2',
            'color' => 'B&W',
        ]);

        $date2= Date::create([
            'dates' => Carbon::tomorrow()
        ]);
        $ad2->dates()->save($date2);


        $this->actingAs($editor)
            ->visit(route('active-ads.index'))
            ->see('Lista de Publicidades para Publicar')
            ->see('publicidad1')
            ->see('Full Color')
            ->dontSee('publicidad2')
            ->dontSee('B&W');
    }

    public function test_assign_ad_to_active_page()
    {
        $editor = $this->defaultUser([
            'name' => 'Jorge Quiros'
        ])->assign('admin');

        $date = Carbon::now()->format('Y-m-d');
        $editions_number = 8459;

        $edition = factory(App\Edition::class)->create([
            'date' => $date,
            'number_of_edition' => $editions_number,
            'status' => 'active'
        ]);

        $this->createSectionRegular('Edicion Central', 20);

        $edition->builderEdition();


        $ad1=factory(App\Ad::class)->create([
            'name' => 'publicidad1',
            'color' => 'Full Color',
        ]);

        $date1= Date::create([
            'dates' => Carbon::now()
        ]);
        $ad1->dates()->save($date1);

        $activeEdition = Edition::active()->with('editionsection.pages')->first();
        $pages= $activeEdition->pages()->where('editionsection_id', $ad1->id)->pluck('page_number', 'pages.id');

        $this->actingAs($editor)
            ->visit(route('active-ads.index'))
            ->see('Lista de Publicidades para Publicar')
            ->see('publicidad1')
            ->see('Full Color')
            ->see('Asignar a Página')
            ->click('Asignar a Página')
            ->see('Asignar Publicidad a Página');
    }

    private function createSectionRegular($name, $pages = 4)
    {
        factory(App\Section::class)->create([
            'name' => $name,
            'pages' => $pages,
        ]);
    }
}
