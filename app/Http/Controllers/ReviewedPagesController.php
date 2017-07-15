<?php

namespace App\Http\Controllers;

use App\Edition;
use App\Note;
use App\Page;
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

        $notes = $page->notes()->get();
        for ($i = 0; $i < count($notes); $i++){
            $note = Note::findOrFail($notes[$i]->id);
            $note->changeStatusPublished();
            $note->save();
        }

        $pages= Edition::countPagesActiveEdition();
        if ($pages[0]->pages_count==$pages[0]->pages_status_count){
            Edition::active()->first()->done();

            $discardNotes = Note::where('discarded', false)->whereNotIn('status', [7])->get();
            for ($i = 0; $i< count($discardNotes); $i++){
                $discardNote = Note::findOrFail($discardNotes[$i]->id);
                $discardNote->discard();
                $discardNote->save();
            }
        }

        Alert::success('Page '. $page->page_number . ' impresa');
        return redirect()->route('reviewed-pages.index');
    }
}
