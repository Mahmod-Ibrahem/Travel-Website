<?php

namespace Modules\Tour\Traits;

use App\Models\IpTable;
use Modules\Review\Entities\Review;
use Modules\Tour\Entities\Tour;

trait TourUtility
{

    public function storeIp($ip, $tour_id): void
    {
        $flag = IpTable::where('ip', $ip)->where('tour_id', $tour_id)->exists();
        if (!$flag) {
            IpTable::create([
                'ip' => $ip,
                'tour_id' => $tour_id
            ]);
            //Increase The Counter

            $tour=Tour::find($tour_id);
            $tour->visit_count=$tour->visit_count+1;
            $tour->save();
        }
    }

     function getTourReviews($id)
    {
        return Review::where('tour_id','=',$id)->get();
    }

}
