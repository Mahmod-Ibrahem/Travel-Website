<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DTourRequest;
use App\Models\Category;
use App\Models\IpTable;
use App\Models\Tour;
use App\Traits\TourUtility;
use Illuminate\Http\Request;

class DaytoursController extends Controller
{
    use TourUtility;
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
        $tour = Tour::where('slug', $Tour)->with('images')->first();

        $tour->locations=implode('/',json_decode($tour->locations));
        $this->storeIp(Request()->ip(),$tour->id);

        //get() hatrg3ly kol al instance 7ta lo katbt 2blha first()
        return view('Tour', compact('tour'));
    }
}
