<?php

namespace Modules\Exclusion\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Exclusion\Entities\Exclusion;
use Modules\Exclusion\Http\Requests\ExclusionRequest;
use Modules\Exclusion\Transformers\ExclusionResource;

class ExclusionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 20);
        $exclusions = Exclusion::paginate($perPage);
        return ExclusionResource::collection($exclusions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExclusionRequest $request)
    {
        $exclusion = Exclusion::create($request->validated());
        return new ExclusionResource($exclusion);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $exclusion = Exclusion::findOrFail($id);
        return new ExclusionResource($exclusion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExclusionRequest $request, $id)
    {
        $exclusion = Exclusion::findOrFail($id);
        $exclusion->update($request->validated());
        return new ExclusionResource($exclusion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $exclusion = Exclusion::findOrFail($id);
        $exclusion->delete();
        return response()->json(['message' => 'Exclusion deleted successfully']);
    }
}
