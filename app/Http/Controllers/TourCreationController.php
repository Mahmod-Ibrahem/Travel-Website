<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourCreationController extends Controller
{
    public function index()
    {
        return view('tourcreation.index');
    }

    public function show(Request $request)
    {
        //Get Submit Data
        $data = $request->all();

        //Get Only True Values From Checkboxes
        $filteredData = array_filter($data, function ($value) {
            return $value == 'on';
        });

        //Get Only Keys of the checkbox which has true value
        $keys = array_keys($filteredData);


        $tours = Tour::where(function ($query) use ($keys) {
            foreach ($keys as $key) {
                $query->orWhereJsonContains('locations', $key);
            }
        })
            ->with('category')
            ->get()
            ->toArray();


        return view('tourcreation.show', compact('tours'));
    }
}
