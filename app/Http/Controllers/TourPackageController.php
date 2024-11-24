<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class TourPackageController extends Controller
{
    public function index()
    {
        $category = Category::where('type', '=', 'Tour Packages')->withCount('tours')->get()->toArray();
        return view('TourPackage..index', compact('category'));    }
}
