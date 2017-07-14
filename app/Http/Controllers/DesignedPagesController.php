<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Support\Facades\Input;
use Styde\Html\Facades\Alert;

class DesignedPagesController extends Controller
{
    public function index()
    {
        $pages = Page::statusDesigned()->get();
        return view('designed-pages.list', compact('pages'));
    }

    public function showPage($id)
    {
        $page = Page::findOrFail($id);
        return view('designed-pages.show-page', compact('page'));
    }

    public function downloadPage($id)
    {
        $page = Page::findOrFail($id);
        $public_path = public_path();
        $url = $public_path.'/designed/'.$page->designed;
            return response()->download($url);
    }

    public function reviewed($id)
    {
        $this->validate(request(), [
            'template' => ['required', 'file:idml']
        ]);

        $page = Page::findOrFail($id);

        $file = Input::file('template');

        $random_name = str_random(8);
        $original_name = $file->getClientOriginalName();
        $name = $random_name.$original_name;

        \Storage::disk('reviewed')->put($name, \File::get($file));

        $page->reviewed = $name;
        $page->save();

        Alert::success('Página revisada guardada exitosamente');
        return redirect()->route('designed-pages.index');
    }

    public function reviewedReady($id)
    {
        $page = Page::findOrFail($id);
        $page->fill(request()->all());
        $page->save();

        Alert::success('Page '. $page->page_number . ' revisada lista');
        return redirect()->route('designed-pages.index');
    }
}
