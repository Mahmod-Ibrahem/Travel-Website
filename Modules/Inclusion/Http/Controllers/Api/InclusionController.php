<?php

namespace Modules\Inclusion\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Inclusion\Entities\Inclusion;
use Modules\Inclusion\Http\Requests\InclusionRequest;
use Modules\Inclusion\Transformers\InclusionResource;

class InclusionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 20);
        $inclusions = Inclusion::paginate($perPage);
        return InclusionResource::collection($inclusions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InclusionRequest $request)
    {
        $data = $request->validated();

        $inclusion = Inclusion::create($data);
        return new InclusionResource($inclusion);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $inclusion = Inclusion::findOrFail($id);
        return new InclusionResource($inclusion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InclusionRequest $request, $id)
    {
        $inclusion = Inclusion::findOrFail($id);
        $inclusion->update($request->validated());
        return new InclusionResource($inclusion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inclusion = Inclusion::findOrFail($id);
        $inclusion->delete();
        return response()->json(['message' => 'Inclusion deleted successfully']);
    }
}
