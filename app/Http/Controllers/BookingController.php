<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index(Tour $tour){
        $userData=\request()->all();
        $numPerson=(int)$userData['Adult'];

        if($numPerson>0 && $numPerson<2)
        {
            $userData['totalPrice']=(int)$tour->price_per_person*$numPerson;
        }
        else if($numPerson>1 && $numPerson<6)
        {
            $userData['totalPrice']=(int)$tour->price_two_five *$numPerson;
        }
        else
        {
            $userData['totalPrice']=(int)$tour->price_six_twenty *$numPerson;
        }
        //To Do Ask For Childeren !!
        return view('checkout',compact('tour','userData'));
    }

    public function confirm(Tour $tour ,Request $request)
    {
        $data=$request->input('userData');
//        $categorySlug=$tour->category->slug;
        $tourType=$tour->group;
//        $tourSlug=$tour->slug;
        $tour=$tour->toArray();

        \Mail::to('mahmodaborakika2@gmail.com')->send(new \App\Mail\TourBookingMail($data,$tour));

        $text="Your Tour Is Booked!";
        $thanks="Thanks For Booking With Us";
        $route=$tourType.'.'.'index';

        return view('landing.Responding',compact('text','thanks','route'));

    }
}
