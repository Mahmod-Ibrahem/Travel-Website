<?php

namespace Modules\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Tour;
use Modules\Faq\Entities\Faq;

class HomeController extends Controller
{
    public function home()
    {
        $recommendedDayTours = Tour::where('preference', 'recommended')->where('group', 'DayTours')
            ->whereHas('tourTranslations', function ($query) {
                $query->where('locale', app()->getLocale());
            })
            ->WithTranslations()->get()->toArray();
        $recommendedTourPackages = Tour::where('preference', 'recommended')->where('group', 'TourPackages')
            ->whereHas('tourTranslations', function ($query) {
                $query->where('locale', app()->getLocale());
            })
            ->WithTranslations()->get()->toArray();
        $limitedOffersTorus = Tour::where('preference', 'limited_offers')
            ->whereHas('tourTranslations', function ($query) {
                $query->where('locale', app()->getLocale());
            })
            ->WithTranslations()->get()->toArray();
        $reviews = Review::where('tour_id', '=', null)->get();
        $faqs=Faq::with('translations')->get();
        return view('home::index', compact('recommendedDayTours', 'recommendedTourPackages', 'limitedOffersTorus', 'reviews', 'faqs'));
    }
}
