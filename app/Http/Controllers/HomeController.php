<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $recommendedTours=Tour::where('preference',  'recommended')->with('category')->get()->toArray();
        $hiddenGemsTours=Tour::where('preference',  'hidden_gems')->with('category')->get()->toArray();
        $limitedOffersTorus=Tour::where('preference',  'limited_offers')->with('category')->get()->toArray();
        return view('HomeView.HomePage',compact('recommendedTours','hiddenGemsTours','limitedOffersTorus'));
    }
}
