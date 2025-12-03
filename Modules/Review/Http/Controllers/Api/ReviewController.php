<?php

namespace Modules\Review\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use Modules\Review\Entities\Review;
use Modules\Review\Transformers\ReviewListResource;
use Modules\Review\Transformers\ReviewResource;

class ReviewController extends Controller
{
    public function index()
    {
        $SortField = request('sortField', 'created_at');
        $SortDirection = request('sortDirection', 'asc');
        $search = request('search');
        $perPage = request('perPage', 10);

        // Eager load 'category' relationship
        $reviews = Review::with(['tour.tourTranslations' => function ($query) {
            $query->where('locale', 'en');
        }])
            ->orderBy($SortField, $SortDirection);

        if ($search) {
            $reviews->where('title', 'LIKE', "%$search%")
                ->orWhere('content', 'LIKE', "%$search%")
                ->orWhereHas('tour', function ($query) use ($search) {
                    $query->where('title', 'LIKE', "%$search%");
                }); //Wherehas used to search tour title
        }


        return ReviewListResource::collection($reviews->paginate($perPage));
    }

    public function show($id)
    {
        $review = Review::find($id);

        if ($review) {
            return new ReviewResource($review);
        } else {
            return response()->json(['message' => 'Review not found'], 404);
        }
    }


    public function update(StoreReviewRequest $request)
    {
        $data = request()->all();
        $review = Review::find($data['id']);
        $review->update($data);
        return new ReviewResource($review);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(StoreReviewRequest $request)
    {
        $data = $request->validated();
        $review = Review::create($data);
        return new ReviewResource($review);
    }

    public function destroy($id)
    {

        $review = Review::find($id);
        if ($review == null) {
            return response()->json(['message' => 'Review not found'], 404);
        }
        $review->delete();
        return response()->noContent();
    }
}
