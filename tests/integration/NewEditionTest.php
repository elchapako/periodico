<?php

use App\Edition;
use Carbon\Carbon;

class NewEditionTest extends FeatureTestCase
{
    public function test_edition()
    {
        $edition = factory(Edition::class)->create([
            'date' => Carbon::today(),
            'number_of_edition' => 5555,
            'status' => 'active'
        ]);

        $this->createSectionRegular('Edicion Central', 20);
        $this->createSectionRegular('Campeón', 8);
        $this->createSectionRegular('Crónica', 8);
        $this->createSectionRegular('Comodín');
        $this->createSectionRegular('Pura Cepa');


        $edition->builderEdition();

        //foreach (Edition::first()->editionsection as $cuerpo) {
          //  dd(Edition::first()->editionsection);
        //    echo "\n{$cuerpo->section->name}\n";
        //    foreach ($cuerpo->pages->chunk(4) as $chunk) {
        //        foreach ($chunk as $page) {
        //            echo "pagina: {$page->page_number} -Estado {$page->status} \n";
        //        }
        //    }
        //}
    }

    private function createSectionRegular($name, $pages = 4)
    {
        factory(App\Section::class)->create([
            'name' => $name,
            'pages' => $pages,
        ]);
    }
}