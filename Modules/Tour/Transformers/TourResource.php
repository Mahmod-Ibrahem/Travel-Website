<?php

namespace Modules\Tour\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = false;

    public function toArray(Request $request): array
    {
        $locale = request('locale', 'en');
        return [
            'id' => $this->id,
            'group' => $this->group,
            'category_id' => $this->category->id ?? null,
            'preference' => $this->preference,
            'title' => $this->getTranslation('title', $locale),
            'description' => $this->getTranslation('description', $locale),
            'places' => $this->getTranslation('places', $locale),
            'included' => $this->getTranslation('included', $locale),
            'excluded' => $this->getTranslation('excluded', $locale),
            'locations' => $this->locations->pluck('id'),
            'itenary_title' => $this->getTranslation('itenary_title', $locale),
            'itenary_section' => $this->getTranslation('itenary_section', $locale),
            'price_per_person' => $this->price_per_person,
            'tour_cover' => $this->tour_cover,
            'price_two_five' => $this->price_two_five,
            'price_six_twenty' => $this->price_six_twenty,
            'duration' => $this->getTranslation('duration', $locale),
            'tour_images' => $this->images,
        ];
    }
}
