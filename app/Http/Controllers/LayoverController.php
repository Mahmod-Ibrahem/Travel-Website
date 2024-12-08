<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Traits\TourUtility;
use Illuminate\Http\Request;

class LayoverController extends Controller
{
    use TourUtility;
    public function index()
    {
        $tours=Tour::where('group', '=', 'LayoverTours')->get()->toArray();
        return view('layover.index' ,compact('tours'));
    }

    public function Tour($Tour)
    {
        $tour = Tour::where('slug', $Tour)->with('images')->first();
        $tour->locations=implode('-',json_decode($tour->locations));

        $this->storeIp(Request()->ip(),$tour->id);
        return view('Tour', compact('tour'));    }
}
