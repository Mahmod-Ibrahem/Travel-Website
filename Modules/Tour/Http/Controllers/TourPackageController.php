<?php

namespace Modules\Tour\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Category\Entities\Category;
use Modules\Category\Services\CategoryService;
use Modules\Review\Entities\Review;
use Modules\Tour\Entities\Tour;
use Modules\Tour\Service\TourService;
use Modules\Tour\Traits\TourUtility;

class TourPackageController extends Controller
{
    use TourUtility;

    public function __construct(protected TourService $tourService) {}

    public function index()
    {
        $tours = $this->tourService->getToursByGroup('tour-packages');
        return view('tour::tour-package-index', compact('tours'));
    }


    //    public function view($Category)
    //    {
    //        $tours = $this->tourService->getToursByCategory($Category);
    //        return view('tour::view', compact('tours'));
    //    }

    public function view($Tour)
    {
        $tour = $this->tourService->getTourBySlug($Tour);

        $this->storeIp(Request()->ip(), $tour->id);
        $reviews = Review::take(20)->get();
        return view('tour::tour', compact('tour', 'reviews'));
    }
}
