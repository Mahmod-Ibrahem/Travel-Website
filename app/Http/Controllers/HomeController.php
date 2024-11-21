<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('HomeView.HomePage');
    }
}
