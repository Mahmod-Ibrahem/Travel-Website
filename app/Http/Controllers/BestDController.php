<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class BestDController extends Controller
{
    public function index($location)
    {
        //$tours=Tour::whereJsonContains('locations', $location)->get()->toArray();
        $tours = Tour::whereJsonContains('locations', $location)
            ->whereRaw('JSON_LENGTH(locations) = 1')
            ->with('category')
            ->get()
            ->toArray(); //filter based on lengh
//        dd($tours);
        return view('BestDestination.index', compact('tours', 'location'));
    }
}
