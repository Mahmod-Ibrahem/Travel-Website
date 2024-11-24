<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class SafariAdventures extends Controller
{
    public function index()
    {
        $tours=Tour::where('group', '=', 'Safari Adventures')->get()->toArray();
        return view('SafariAdventures.index' ,compact('tours'));}
}
