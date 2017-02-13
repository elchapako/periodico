<?php namespace App\Http\ViewComposers;

use App\Edition;
use Illuminate\Contracts\View\View;

class EditionComposer
{
    public function compose(View $view)
    {
        $edition = Edition::take(1)->OrderBy('created_at', 'DESC')->get();
        $view->with('edition', $edition);
    }
}