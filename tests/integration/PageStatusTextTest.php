<?php

use App\Page;

class PageStatusTextTest extends FeatureTestCase
{
    public function test_show_page_status_text()
    {
        $page = factory(Page::class)->create([
            'status' => 2
        ]);
        //dd($page);
        $status = $page->status_text;
        $this->assertEquals($status, 'Asignando Noticias');
    }
}
