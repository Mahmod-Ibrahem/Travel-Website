<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class PopularDestController extends Controller
{
    public function popDest($Dest)
    {
        $tours=Tour::where('city',$Dest)->get();
        return view('PopularDestTours',['tours'=>$tours,'city'=>$Dest]);
    }
}
