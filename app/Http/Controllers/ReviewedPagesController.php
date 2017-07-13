<?php

namespace App\Http\Controllers;

use App\Note;
use App\Page;
use Illuminate\Http\Request;
use Spatie\Activitylog\ActivitylogFacade;
use Styde\Html\Facades\Alert;

class ReviewedPagesController extends Controller
{
    public function index()
    {
        $pages = Page::statusReviewed()->get();
        return view('reviewed-pages.list', compact('pages'));
    }

    public function downloadPage($id)
    {
        $page = Page::findOrFail($id);
        $public_path = public_path();
        $url = $public_path.'/reviewed/'.$page->reviewed;
        return response()->download($url);
    }

    public function printed($id)
    {
        $page = Page::findOrFail($id);
        $page->fill(request()->all());
        $page->save();

        ActivitylogFacade::log('Imprimió página: '. $page->id);

        $notes = $page->notes()->get();
        for ($i = 0; $i < count($notes); $i++){
            $note = Note::findOrFail($notes[$i]->id);
            $note->changeStatusPublished();
            $note->save();
            ActivitylogFacade::log('Publicó: '. $note->id);
        }

        Alert::success('Page '. $page->page_number . ' impresa');
        return redirect()->route('reviewed-pages.index');
    }
}
