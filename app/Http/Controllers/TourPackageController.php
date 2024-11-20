<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TourPackageController extends Controller
{
    public function index()
    {
        return view('TourPackage.index');
    }
}
