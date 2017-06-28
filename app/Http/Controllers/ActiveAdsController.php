<?php

namespace App\Http\Controllers;

use App\Date;
use App\Edition;
use Illuminate\Http\Request;

class ActiveAdsController extends Controller
{
    public function index()
    {
        $active = Edition::active()->first();
        $activeDate = $active->date;
        $date = Date::where('dates', $activeDate)->first();
        if ($date==null){
            $ads = '';
        }else{
        $ads = $date->ads()->paginate(15);
        }
        return view('active-ads.list', compact('ads'));
    }
}
