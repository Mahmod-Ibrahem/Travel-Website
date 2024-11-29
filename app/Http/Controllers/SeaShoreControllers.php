<?php

namespace App\Http\Controllers;

use App\Models\IpTable;
use App\Models\Tour;
use App\Traits\TourUtility;
use Illuminate\Http\Request;

class SeaShoreControllers extends Controller
{
    use TourUtility ;
    public function index()
    {
        $tours=Tour::where('group','SeaShoreTours')->get()->toArray();
        return view('SeaShore.index' , compact('tours'));
    }

    public function Tour($Tour)
    {
        $tour = Tour::where('slug', $Tour)->with('images')->first();
        $tour->locations=implode('-',json_decode($tour->locations));

        $this->storeIp(Request()->ip(),$tour->id);



        return view('Tour', compact('tour'));
    }
}
