<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class SeaShoreControllers extends Controller
{
    public function index()
    {
        $tours=Tour::where('group','SeaShoreTours')->get()->toArray();
        return view('SeaShore.index' , compact('tours'));
    }

    public function Tour($Tour)
    {
        $CurrentTour = Tour::where('slug', $Tour)->get()->toArray();
        return view('SeaShore.tours', ['currentTour' => $CurrentTour]);
    }
}
