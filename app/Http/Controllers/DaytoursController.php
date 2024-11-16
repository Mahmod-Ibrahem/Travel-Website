<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DTourRequest;
use App\Models\Tour;
use Illuminate\Http\Request;

class DaytoursController extends Controller
{
    public function index()
    {
        return view('Daytours.index');
    }
    public function create()
    {
        return view('Daytours.create');
    }

    public function store(DTourRequest $request)
    {
        $vaildated_data = $request->validated();
        //fi al 2ol al php bysgl al img fe temporary files f lazm 23ml al 5atoa al gaya di 34an
        //a5lih fi mkan permanent
        $vaildated_data['path'] = $vaildated_data['path']->store('DTourMImage');
        //thumbnails da folder goa al storage->app folder
        Tour::create($vaildated_data);
        // session()->flash('status', 'Tour was Added!');
        return redirect()->route('Daytours.index');
    }

    public function show($Daytour)
    {
        if($Daytour=='Cairo')
        {
            $tours = Tour::where('Tourtype','daytour')->where('city','Cairo')->get();
        }
        else if($Daytour=='Luxor')
        {
            $tours = Tour::where('Tourtype','daytour')->where('city','Luxor')->get();

        }
        else if($Daytour=='Aswan')
        {
            $tours = Tour::where('Tourtype','daytour')->where('city','Aswan')->get();
        }
        else if($Daytour=='Hurghada')
        {
            $tours = Tour::where('Tourtype','daytour')->where('city','Hurghada')->get();
        }
        else if($Daytour=='SharmElSheikh')
        {
            $tours = Tour::where('Tourtype','daytour')->where('city','SharmElSheikh')->get();
        }
        return view('Daytours.show',['tours'=>$tours]);
    }
        public function Tour($tour)
        {
            $CurrentTour=Tour::where('title',$tour)->first();
                return view('tour',['currentTour'=>$CurrentTour]);
        }
    }
