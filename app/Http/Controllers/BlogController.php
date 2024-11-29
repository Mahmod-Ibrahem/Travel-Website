<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('Blog.index');
    }

    public function show(string $Blog)
    {
        $city=explode(' ',$Blog);
        $city=$city[0];
        return view('Blog.show',['about'=>$Blog,'city'=>$city]);
    }

    public function Attraction($city,$attract)
    {
        $view='components' . '.' . 'Blog' . '.' . $city .'.' . $attract;
        return view($view);
    }
}



