<?php

namespace Modules\City\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Traits\ImagesUtility;
use Illuminate\Support\Facades\Storage;
use Modules\City\Http\Requests\CityRequest;
use Modules\City\Transformers\CityResource;


class CityController extends Controller
{
    use ImagesUtility;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return CityResource::collection($cities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request)
    {
        $validatedCityData = $request->validated();
        $storedImage = $this->storeImage($validatedCityData['image'], 'city');
        $validatedCityData['image'] = $storedImage;
        $createdCity = City::create($validatedCityData);
        return new CityResource($createdCity);
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        return new CityResource($city);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request, City $city)
    {
        $validatedCityData = $request->validated();
        if ($validatedCityData['image'] ?? false) {
            if ($city->image ?? false) {
                $relativePath = $this->getRelativePath($city->image);
                Storage::delete($relativePath);
            }
            $validatedCityData['image'] = $this->storeImage($validatedCityData['image'], 'blog');
        } else {
            $validatedCityData['image'] = $city['image']; //34an lma agy 23ml insert myb2a5 null lo mfi4 image asln
        }
        $city->update($validatedCityData);
        return new CityResource($city);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return response()->noContent();
    }
}
