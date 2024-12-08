<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductResource;
use App\Models\Tour;
use App\Models\TourImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use URL;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SortField = request('sortField', 'updated_at');
        $SortDirection = request('sortDirection', 'desc');
        $search = request('search');
        $perPage = request('perPage', 20);

        // Eager load 'category' relationship
        $products = Tour::with('category')
            ->orderBy($SortField, $SortDirection);

        if ($search) {
            $products->where('title', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%");
        }

        return ProductListResource::collection($products->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        //Check if the tour exists
        if (Tour::where('title', $data['title'])->exists()) {
            return response()->json(['message' => 'Tour already exists'], 409);
        }
        //handling image cover make it stored in Imaged/Group of Image/TitleCover.extension
        // create image manager with desired driver
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()) . '.' . $data['tour_cover']->getClientOriginalExtension();
        $dir_path = 'Images/' . $data['group']; // Adjusted path

        // Check if directory exists, if not create it
        if (!file_exists(storage_path('app/public/' . $dir_path))) {
            mkdir(storage_path('app/public/' . $dir_path), 0755, true); // Create the directory if it doesn't exist
        }

        // Process and save the image
        try {
            $img = $manager->read($data['tour_cover']);
            $img = $img->resize(640, 640);
            $img->toWebp()->save(storage_path('app/public/' . $dir_path . '/' . $name_gen));
        } catch (Exception $e) {
            return response()->json(['message' => 'Error processing image: ' . $e->getMessage()], 500);
        }
        $data['tour_cover'] = $data['tour_cover']->storeAs("Images/{$data['group']}", $data['title'] . "." . "Cover" . "." . $data['tour_cover']->getClientOriginalExtension());
        $data['tour_cover'] = URL::to(Storage::url($data['tour_cover']));
        //Store Tour to get its id and assign to it images model
        $CreatedTour = Tour::create($data);


//        handling Tour Images
        $tourImages = $data['tour_images'];

        foreach ($tourImages as $key => $image) {
            $image = $image->storeAs("Images/{$data['group']}", $data['title'] . "." . $key . "." . $image->getClientOriginalExtension());
            $image = URL::to(Storage::url($image));
            TourImage::create([
                'tours_id' => $CreatedTour->id,
                'image_url' => $image,
            ]);
        }

        return response()->json(['message' => 'Tour created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $tour = Tour::find($id);
        return new ProductResource($tour);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $tour = Tour::find($id);
        if ($data['tour_cover'] ?? false) {
            if ($tour->tour_cover) {
                Storage::delete($tour->tour_cover);
            }
            $data['tour_cover'] = $data['tour_cover']->storeAs("Images/{$data['group']}/{$data['title']}", $data['title'] . "." . "Cover" . "." . $data['tour_cover']->getClientOriginalExtension());
            $data['tour_cover'] = URL::to(Storage::url($data['tour_cover']));
        } else {
            $data['tour_cover'] = $tour->tour_cover;
        }
        //handle location to be  a json before uddating

        $data['locations'] = json_encode(array_map('trim', explode('/', $data['locations'])));
        $data['visit_count'] = $tour->visit_count;
        //Check For Type to set Cateogry_id to custom its group safart or sea shore
//        $data['group'] == 'SeaShoreTours' || $data['group'] == 'SafariAdventures'
//            ? $data['category_id'] = null : null;

        $tour->update($data);
        return response()->json(['message' => 'Tour updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $product)
    {
        $product->delete();

        return response()->noContent();
    }

    public function addImages(Request $request, string $id)
    {
        $data = $request->all();
        $tour = Tour::find($id);
        $tourImages = $data['tour_images'];

        foreach ($tourImages as $key => $image) {
            $image = $image->storeAs("Images/{$data['group']}/{$data['title']}", $data['title'] . "." . $key . "." . $image->getClientOriginalExtension());
            $image = URL::to(Storage::url($image));
            TourImage::create([
                'tours_id' => $tour->id,
                'image_url' => $image,
            ]);
        }
        return response()->json(['message' => 'Images Added successfully'], 200);


    }

    public function deleteImage(string $id)
    {
        $tourImage = TourImage::find($id);
        Storage::delete($tourImage->image_url);
        $tourImage->delete();
        return response()->json(['message' => 'Image deleted successfully'], 200);
    }
}
