<?php namespace App\Http\ViewComposers;

use App\Edition;
use Illuminate\Contracts\View\View;

class EditionComposer
{
    public function compose(View $view)
    {
        $lastEdition = Edition::latest()->first();
        $view->with('edition', $lastEdition);
    }
}