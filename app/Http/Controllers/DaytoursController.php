<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DTourRequest;
use App\Models\Category;
use App\Models\IpTable;
use App\Models\Tour;
use Illuminate\Http\Request;

class DaytoursController extends Controller
{
    public function index()
    {
        $category = Category::where('type', '=', 'DayTours')->withCount('tours')->get()->toArray();
        return view('Daytours.index', compact('category'));
    }


    public function store(DTourRequest $request)
    {

    }

    public function view($Category)
    {

        $tours=Tour::whereHas('category', function ($query) use ($Category) {
            $query->where('slug', $Category);
        })->with('category')->get()->toArray();
        return view('view', compact('tours'));
    }

    public function Tour($Cateogry, $Tour)
    {
        dd($Tour);
        $CurrentTour = Tour::where('title', $tour)->first();
        return view('Daytours.tours', ['currentTour' => $CurrentTour]);
    }
}
