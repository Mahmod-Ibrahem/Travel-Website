<?php

namespace Modules\Itenary\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Itenary\Entities\Itenary;
use Modules\Itenary\Http\Requests\ItenaryRequest;
use Modules\Itenary\Transformers\ItenaryResource;

class ItenaryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $query = Itenary::query();

        if ($request->has('tour_id')) {
            $query->where('tour_id', $request->tour_id);
        }

        $itenaries = $query->get();

        return ItenaryResource::collection($itenaries);
    }

    /**
     * Store a newly created resource in storage.
     * @param ItenaryRequest $request
     * @return ItenaryResource
     */
    public function store(ItenaryRequest $request)
    {
        $data = $request->validated();
        $locale = $data['locale'] ?? 'en';

        $itenary = new Itenary();
        $itenary->tour_id = $data['tour_id'];
        $itenary->setTranslation('title', $locale, $data['title']);
        $itenary->setTranslation('description', $locale, $data['description']);
        $itenary->save();

        return new ItenaryResource($itenary);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return ItenaryResource
     */
    public function show($id)
    {
        $itenary = Itenary::findOrFail($id);
        return new ItenaryResource($itenary);
    }

    /**
     * Update the specified resource in storage.
     * @param ItenaryRequest $request
     * @param int $id
     * @return ItenaryResource
     */
    public function update(ItenaryRequest $request, $id)
    {
        $data = $request->validated();
        $locale = $data['locale'] ?? 'en';

        $itenary = Itenary::findOrFail($id);

        if (isset($data['title'])) {
            $itenary->setTranslation('title', $locale, $data['title']);
        }
        if (isset($data['description'])) {
            $itenary->setTranslation('description', $locale, $data['description']);
        }

        $itenary->save();

        return new ItenaryResource($itenary);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $itenary = Itenary::findOrFail($id);
        $itenary->delete();

        return response()->json(['message' => 'Itenary deleted successfully']);
    }
}
