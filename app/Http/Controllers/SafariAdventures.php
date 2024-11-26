<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class SafariAdventures extends Controller
{
    public function index()
    {
        $tours=Tour::where('group', '=', 'SafariAdventures')->get()->toArray();
        return view('SafariAdventures.index' ,compact('tours'));
    }

    public function Tour($Tour)
    {
        $tour=Tour::where('slug', $Tour)->get()->toArray();
        return view('Tour' ,compact('tour'));
    }
}
