<?php

namespace Modules\Blog\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Modules\Blog\Entities\Blog;
use Modules\City\Entities\City;

class BlogController extends Controller
{
    public function index()
    {
        $cities=City::all();
        return view('blog::index',['cities' => $cities]);
    }

    public function show(City $city)
    {
        $cityAttractions=Blog::where('city_id', $city->id)->get();
        $city=$city->name;
        return view('blog::show',compact('cityAttractions','city'));
    }

    public function Attraction(City $city,Blog $blog)
    {
        return view('blog::blog',compact('city','blog'));
    }
}



