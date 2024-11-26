<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class BestDController extends Controller
{
    public function index($location)
    {
        $tours=Tour::whereJsonContains('locations', $location)->get()->toArray();

        dd($tours);
    }
}
