<?php

namespace Modules\Tour\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Review\Entities\Review;
use Modules\Tour\Service\TourService;
use Modules\Tour\Traits\TourUtility;

class DayTourController extends Controller
{
    use TourUtility;

    public function __construct(protected TourService $tourService) {}

    public function index()
    {
        $tours = $this->tourService->getToursByGroup('day-tours');

        return view('tour::day-tour-index', compact('tours'));
    }

    public function view($Tour)
    {
        $tour = $this->tourService->getTourBySlug($Tour);

        $this->storeIp(Request()->ip(), $tour->id);
        $reviews = Review::take(20)->get();
        return view('tour::tour', compact('tour', 'reviews'));
    }
}
