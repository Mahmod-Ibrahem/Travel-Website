<?php

namespace App\Traits;

use App\Models\IpTable;
use App\Models\Tour;
use Illuminate\Support\Facades\DB;

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

            $tour = Tour::find($tour_id);
            $tour->visit_count = $tour->visit_count + 1;
            $tour->save();
        }
    }

    public function getRelatedTours($locations, $id)
    {
        return Tour::where(function ($query) use ($locations) {
            foreach ($locations as $location) {
                $query->whereJsonContains('locations', $location);
            }
        })
            ->where('id', '!=', $id)
            ->inRandomOrder()
            ->take(3)
            ->get();
    }


//    public function Counter($tourIds)
//    {
//        return IpTable::whereIn('tour_id', $tourIds)->groupBy('tour_id')->select('tour_id', DB::raw('count(tour_id) as count'))->get()->toArray();
//
//        /*Same AS SELECT tour_id, COUNT(*) AS count
//        FROM ip_table
//        WHERE tour_id IN (1, 2, 3)
//        GROUP BY tour_id; */
//    }
}
