<?php

namespace Modules\Setting\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Http\Requests\SettingRequest;
use Modules\Setting\Transformers\SettingResource;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $settings = Setting::paginate(20);

        return SettingResource::collection($settings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingRequest $request): SettingResource
    {
        $setting = Setting::create($request->validated());

        return new SettingResource($setting);
    }

    /**
     * Show the specified resource.
     */
    public function show($id): SettingResource
    {
        $setting = Setting::findOrFail($id);

        return new SettingResource($setting);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request, $id): SettingResource
    {
        $setting = Setting::findOrFail($id);
        $setting->update($request->validated());

        return new SettingResource($setting);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();

        return response()->json(['message' => 'Setting deleted successfully']);
    }
}
