<?php

namespace Modules\Location\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ImagesUtility;
use Modules\Location\Entities\Location;
use Modules\Location\Http\Requests\LocationRequest;
use Modules\Location\Transformers\LocationResource;

class LocationController extends Controller
{
    use ImagesUtility;

    public function index()
    {
        $locations = Location::all();

        return LocationResource::collection($locations);
    }

    public function show(Location $location)
    {
        return new LocationResource($location);
    }

    public function store(LocationRequest $request)
    {
        $data = $request->validated();

        $data['image'] = $this->storeImage($data['image'], 'location');
        Location::create($data);

        return response()->json([
            'message' => 'Location created successfully'], 201);
    }

    public function update(LocationRequest $request, Location $location)
    {
        $data = $request->validated();
        (isset($data['image'])) ? $data['image'] = $this->storeImage($data['image'], 'location') : null;
        $location->update($data);
        return response()->json([
            'message' => 'Location updated successfully'], 200);
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return response()->noContent();
    }

    public function getLocationForTranslation(Location $location)
    {
        return response()->json([
            'id' => $location->id,
            'availableLocales' => array_diff(['en', 'de'], $location->locales()),
            'locale' => ''
        ]);
    }

    public function createLocationTranslation(\Illuminate\Http\Request $request, Location $location)
    {
        $location->setTranslation('name', $request->input('locale'), $request->input('name'));
        $location->save();
        return response()->json([
            'message' => 'Location translation created successfully'], 201);
    }

}
