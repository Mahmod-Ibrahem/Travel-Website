<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use App\Traits\TourUtility;
use Illuminate\Http\Request;

class TourPackageController extends Controller
{
    use TourUtility;

    public function index()
    {
        $category = Category::where('type', '=', 'TourPackages')->withCount('tours')->get()->toArray();
        return view('TourPackage.index', compact('category'));
    }

    public function view($Category)
    {
        $tours = Tour::whereHas('category', function ($query) use ($Category) {
            $query->where('slug', $Category);
        })->with('category')->get()->toArray();


        return view('view', compact('tours'));
    }

    public function Tour($Category,$Tour)
    {
        $tour = Tour::where('slug', $Tour)->with('images')->first();
        $tour->locations = implode('-', json_decode($tour->locations));
        $this->storeIp(Request()->ip(), $tour->id);

        return view('Tour', compact('tour'));
    }

}
