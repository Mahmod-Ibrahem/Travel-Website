<?php

namespace Modules\Tour\Service;

use App\Models\TourImage;
use App\Traits\ImagesUtility;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\Tour\Entities\Tour;

class TourService
{
    use ImagesUtility;

    public function getToursByCategory($Category)
    {
        $tours = Tour::whereHas('category', function ($query) use ($Category) {
            $query->whereJsonContains('slug->' . app()->getLocale(), $Category);
        })->get();

        return $tours->map(function ($tour) {
            $tourArray = $tour->toArray();
            // Manually overwrite with translations for array output
            foreach ($tour->translatable as $field) {
                $tourArray[$field] = $tour->getTranslation($field, app()->getLocale());
            }
            return $tourArray;
        })->toArray();
    }

    public function getTourBySlug($slug)
    {
        return Tour::whereJsonContains('slug->' . app()->getLocale(), $slug)
            ->with(['images', 'category'])->first();
    }

    public function getToursByGroup($group)
    {
        return Tour::where('group', $group)->get();
    }

    public function getTourByPreferenceAndGroup($preference, $group)
    {
        return Tour::where('preference', $preference)
            ->where('group', $group)
            ->get();
    }

    public function getTourByLocation($locationId)
    {
        return Tour::whereHas('locations', function ($query) use ($locationId) {
            $query->where('locations.id', $locationId);
        })->get();
    }

    public function attachImage($images, $tourId)
    {
        foreach ($images as $image) {
            if ($image instanceof UploadedFile) {
                $image = $this->storeImage($image, 'tour');
                TourImage::create([
                    'tours_id' => $tourId,
                    'path' => $image,
                ]);
            }
        }
    }

    public function deleteImage($images)
    {
        foreach ($images as $imageId) {
            $image = TourImage::findOrFail($imageId);
            $relativePath = $this->getRelativePath($image->path);
            if (Storage::exists($relativePath)) {
                Storage::delete($relativePath);
            }
            $image->delete();
        }
    }

    public function updateTourCover($tour, $newCover)
    {
        // Nothing uploaded → keep old
        if (!$newCover) {
            return $tour->tour_cover;
        }

        // Delete old cover if exists
        if ($tour->tour_cover) {
            $relativePath = $this->getRelativePath($tour->tour_cover);

            if (Storage::exists($relativePath)) {
                Storage::delete($relativePath);
            }
        }

        // Store new uploaded file
        return $this->storeImage($newCover, 'tourCover');
    }
}
