<?php

namespace Modules\Category\Services;

use Modules\Category\Entities\Category;

class CategoryService
{
    public function getCategoriesWithToursByTypes($categoryType)
    {
        $categories = Category::where('type', '=', $categoryType)
            ->withCount([
                'tours' => function ($query) {
                    $query->whereHas('tourTranslations', function ($query) {
                        $query->where('locale', app()->getLocale());
                    });
                }
            ])->get();

        return $categories->map(function ($category) {
            $categoryArray = $category->toArray();
            $categoryArray['name'] = $category->getTranslation('name', app()->getLocale());
            $categoryArray['slug'] = $category->getTranslation('slug', app()->getLocale());
            return $categoryArray;
        })->toArray();
    }
}
