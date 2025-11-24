<?php

namespace Modules\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Faq\Entities\Faq;
use Modules\Location\Entities\Location;
use Modules\Review\Entities\Review;
use Modules\Tour\Entities\Tour;
use Modules\Tour\Service\TourService;

class HomeController extends Controller
{

    public function __construct(protected TourService $tourService) {}

    public function home()
    {
        $recommendedDayTours = $this->tourService->getTourByPreferenceAndGroup('recommended', 'day-tours');
        $recommendedTourPackages = $this->tourService->getTourByPreferenceAndGroup('recommended', 'tour-packages');
        $locations = Location::all();
        $reviews = Review::where('tour_id', '=', null)->get();
        $faqs = Faq::with('translations')->get();

        return view('home::index', compact('recommendedDayTours', 'recommendedTourPackages', 'reviews', 'faqs', 'locations'));
    }
}
