<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequeust;
use App\Http\Resources\CategoryListResource;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return CategoryListResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequeust $request)
    {
        //Validate Category
        $validatedData = $request->validated();
        $validatedData['image'] = $validatedData['image']->storeAs('images/Category', $validatedData['name'] . '.' . $validatedData['image']->getClientOriginalExtension());
        //this the place where i store image (storage/title/randomname)
        $validatedData['image'] = URL::to(Storage::url($validatedData['image']));
        Category::create($validatedData);
        return response()->json(['message' => 'Category created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->all();
        $image = $data['image'] ?? null;

        if ($image) {

            //remove old image if is set

            if ($category->image) {
                Storage::delete($category->image);
            }
            // Get the original extension of the uploaded image
            $extension = $image->getClientOriginalExtension();

            // Store the image with the title as the name and append the original extension
            $filename = $data['name'] . '.' . $extension;

            // Store the image in the 'public' disk with the correct extension
            $data['image'] = $image->storeAs('images/Category', $filename);

            // Generate the full URL for the stored image
            $data['image'] = URL::to(Storage::url($data['image']));
        } else {
            $data['image'] = $category['image']; //34an lma agy 23ml insert myb2a5 null
        }

        $category->update($data);
        return response()->json(['message' => 'Category updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->noContent();
    }
}
