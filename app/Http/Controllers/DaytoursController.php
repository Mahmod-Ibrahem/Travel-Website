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
        $category = Category::where('type', '=', 'Day Tours')->withCount('tours')->get()->toArray();
        return view('Daytours.index', compact('category'));
    }
    public function create()
    {
        return view('Daytours.create');
    }

    public function store(DTourRequest $request)
    {

    }

    public function view($Daytour,Request $request)
    {

        $ip= $request->ip();
//        if($Daytour=='Cairo')
//        {
//            $tours = Tour::where('Tourtype','daytour')->where('city','Cairo')->get();
//        }
//        else if($Daytour=='Luxor')
//        {
//            $tours = Tour::where('Tourtype','daytour')->where('city','Luxor')->get();
//
//        }
//        else if($Daytour=='Aswan')
//        {
//            $tours = Tour::where('Tourtype','daytour')->where('city','Aswan')->get();
//        }
//        else if($Daytour=='Hurghada')
//        {
//            $tours = Tour::where('Tourtype','daytour')->where('city','Hurghada')->get();
//        }
//        else if($Daytour=='SharmElSheikh')
//        {
//            $tours = Tour::where('Tourtype','daytour')->where('city','SharmElSheikh')->get();
//        }
//        return view('Daytours.show',['tours'=>$tours]);
    }
        public function Tour($tour)
        {
            $CurrentTour=Tour::where('title',$tour)->first();
                return view('tour',['currentTour'=>$CurrentTour]);
        }
    }
