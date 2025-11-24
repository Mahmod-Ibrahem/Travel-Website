<?php

namespace Modules\Category\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TranslationOfCategoryRequest;
use App\Traits\ImagesUtility;
use App\Traits\TourUtility;
use Illuminate\Support\Facades\Storage;
use Modules\Category\Entities\Category;
use Modules\Category\Http\Requests\CategoryRequest;
use Modules\Category\Transformers\CategoryListResource;
use Modules\Category\Transformers\CategoryResource;
use Modules\Category\Transformers\NonTranslatedCategoriesListResource;

class CategoryController extends Controller
{
    use TourUtility, ImagesUtility;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locale = request('locale', 'en');
        // Filter categories that have translation for the given locale
        $categories = Category::all()->filter(function ($category) use ($locale) {
            return $category->hasTranslation('name', $locale);
        });

        return CategoryListResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $validatedData = $request->validated();
        $storedImage = $this->storeImage($validatedData['image'], 'category');

        $category = new Category();
        $category->type = $validatedData['type'];
        $category->image = $storedImage;

        $locale = $validatedData['locale'];
        $this->setTranslations($category, $validatedData, $locale);

        $category->save();

        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            if ($category->image) {
                $relativePath = $this->getRelativePath($category->image);
                if (Storage::exists($relativePath)) {
                    Storage::delete($relativePath);
                }
            }
            $category->image = $this->storeImage($validatedData['image'], 'category');
        }

        if (isset($validatedData['type'])) {
            $category->type = $validatedData['type'];
        }

        $locale = $validatedData['locale'];
        $this->setTranslations($category, $validatedData, $locale);

        $category->save();

        return response()->json(['message' => 'Category updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            $relativePath = $this->getRelativePath($category->image);
            if (Storage::exists($relativePath)) {
                Storage::delete($relativePath);
            }
        }
        $category->delete();
        return response()->noContent();
    }

    public function getNonTranslatedCategories()
    {
        // This logic is complex with JSON columns, skipping for now or returning empty
        // A proper implementation would check if the locale key is missing in the JSON column
        return response()->json([], 200);
    }

    public function translateNewCategory(TranslationOfCategoryRequest $request)
    {
        $validatedData = $request->validated();
        $category = Category::findOrFail($validatedData['category_id']);

        $locale = $validatedData['locale'];
        $this->setTranslations($category, $validatedData, $locale);

        $category->save();

        return response()->json(['message' => 'Category translation added successfully'], 200);
    }

    public function receiveAndUpdateCategoryTranslation(TranslationOfCategoryRequest $request, $id)
    {
        $validatedData = $request->validated();
        $category = Category::findOrFail($id);

        $locale = $validatedData['locale'];
        $this->setTranslations($category, $validatedData, $locale);

        $category->save();

        return response()->json(['message' => 'Category updated successfully'], 200);
    }

    private function setTranslations(Category $category, array $data, string $locale)
    {
        $translatableFields = ['name', 'header', 'bg_header', 'description', 'title_meta', 'description_meta'];

        // Handle slug generation if name is present
        if (isset($data['name'])) {
            $slug = \Illuminate\Support\Str::slug($data['name']);
            $category->setTranslation('slug', $locale, $slug);
        }

        foreach ($translatableFields as $field) {
            if (isset($data[$field])) {
                $value = $data[$field];
                if ($field === 'description') {
                    $value = str_replace('target="_blank"', '', $value);
                }
                $category->setTranslation($field, $locale, $value);
            }
        }
    }
}
