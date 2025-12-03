<?php

namespace Modules\Tour\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Itenary\Transformers\ItenaryResource;

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
        return [
            'id' => $this->id,
            'group' => $this->group,
            'category_id' => $this->category->id ?? null,
            'preference' => $this->preference,
            'title' => $this->title,
            'description' => $this->description,
            'places' => $this->places,
            'included' => $this->inclusions->pluck('id'),
            'excluded' => $this->exclusions->pluck('id'),
            'locations' => $this->locations->pluck('id'),
            'itenary' => ItenaryResource::collection($this->itenaries),
            'price_per_person' => $this->price_per_person,
            'tour_cover' => $this->tour_cover,
            'price_two_five' => $this->price_two_five,
            'price_six_twenty' => $this->price_six_twenty,
            'duration' => $this->duration,
            'tour_images' => $this->images,
        ];
    }
}
