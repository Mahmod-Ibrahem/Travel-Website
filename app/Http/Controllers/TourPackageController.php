<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourPackageController extends Controller
{
    public function index()
    {
        $category = Category::where('type', '=', 'TourPackages')->withCount('tours')->get()->toArray();
        return view('TourPackage.index', compact('category'));
    }

    public function view($Category)
    {
        $tours=Tour::whereHas('category',function($query) use ($Category){
            $query->where('slug', $Category);
        })->with('category')->get()->toArray();
        return view('view',compact('tours'));
    }

    public function Tour($Cateogry, $Tour)
    {
        $tour=Tour::where('slug',$Tour)->first()->toArray();
        dd('Working On It');
        return view('TourPackage.tours',compact('tour'));
    }

}
