<?php

namespace Modules\Tour\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ImagesUtility;
use App\Traits\TourUtility;
use Modules\Tour\Entities\Tour;
use Modules\Tour\Http\Requests\TourRequest;
use Modules\Tour\Service\TourService;
use Modules\Tour\Transformers\TourListResource;
use Modules\Tour\Transformers\TourResource;

class TourController extends Controller
{
    use TourUtility, ImagesUtility;

    public function __construct(protected TourService $tourService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SortField = request('sortField', 'created_at');
        $SortDirection = request('sortDirection', 'asc');
        $search = request('search');
        $perPage = request('perPage', 10);
        $locale = request('locale', 'en');

        $tours = Tour::query();


        $tours->where('title->' . $locale, '!=', null);

        $tours->with(['category']);
        $tours->orderBy($SortField, $SortDirection);

        if ($search) {
            $tours->where(function ($query) use ($search, $locale) {
                $query->where('title->' . $locale, 'LIKE', "%$search%")
                    ->orWhere('description->' . $locale, 'LIKE', "%$search%");
            });
        }
        return TourListResource::collection($tours->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TourRequest $request)
    {
        $data = $request->validated();
        //Check if the tour exists
        if ($this->isTourExist($data['title'])) {
            return $this->showError('Tour with this title Already Exists', 409); //409 Conflict
        }
        $data['tour_cover'] = $this->storeImage($data['tour_cover'], 'tourCover'); //store public path

        $tour = new Tour();
        $tour->category_id = $data['category_id'] ?? null;
        $tour->group = $data['group'];
        $tour->preference = $data['preference'];
        $tour->tour_cover = $data['tour_cover'];
        $tour->price_per_person = $data['price_per_person'];
        $tour->price_two_five = $data['price_two_five'];
        $tour->price_six_twenty = $data['price_six_twenty'];

        $locale = $data['locale'] ?? 'en';
        $this->setTranslations($tour, $data, $locale);
        $tour->save();
        $tour->locations()->attach($data['locations']);
        $tour->inclusions()->attach($data['included']);
        $tour->exclusions()->attach($data['excluded']);

        //handling Tour Images
        $tourImages = $data['tour_images'];

        $this->tourService->attachImage($tourImages, $tour->id);

        return response()->json([
            'message' => 'Tour created successfully',
            'tour' => new TourResource($tour)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tour = Tour::with('locations')->findOrFail($id);
        return new TourResource($tour);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TourRequest $request, string $id)
    {
        $data = $request->validated();
        $tour = Tour::findOrFail($id);

        $data['tour_cover'] = $this->tourService->updateTourCover($tour, $data['tour_cover'] ?? null);


        $tourImages = $data['tour_images'] ?? [];

        $this->tourService->attachImage($tourImages, $tour->id);

        $tourImagesIds = $data['deleted_images_ids'] ?? [];

        $this->tourService->deleteImage($tourImagesIds);


        $tour->fill($data); // Fill non-translatable fields

        $locale = $data['locale'] ?? 'en';
        $this->setTranslations($tour, $data, $locale);

        $tour->save();

        $tour->locations()->sync($data['locations']);
        $tour->inclusions()->sync($data['inclusions']);
        $tour->exclusions()->sync($data['exclusions']);

        return response()->json(['message' => 'Tour updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $product)
    {
        if ($product->tour_cover) {
            $relativePath = $this->getRelativePath($product->tour_cover);
            if (Storage::exists($relativePath)) {
                Storage::delete($relativePath);
            }
        }
        $product->delete();

        return response()->noContent();
    }


    private function isTourExist($title)
    {
        // Simple check on JSON column
        return Tour::whereJsonContains('title->' . app()->getLocale(), $title)->exists();
    }

    private function showError($message, $status)
    {
        return response()->json(['message' => $message], $status);
    }

    private function setTranslations(Tour $tour, array $data, string $locale)
    {
        $translatableFields = ['title', 'description', 'itenary_title', 'itenary_section', 'duration', 'places'];

        if (isset($data['title'])) {
            $slug = \Illuminate\Support\Str::slug($data['title']);
            $tour->setTranslation('slug', $locale, $slug);
        }

        foreach ($translatableFields as $field) {
            if (isset($data[$field])) {
                $tour->setTranslation($field, $locale, $data[$field]);
            }
        }
    }
}
