<?php

namespace Modules\Tour\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TourListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $locale = request('locale', 'en');
        return [
            'id' => $this->id,
            'title' => $this->title,
            'group' => $this->group,
            'preference' => $this->preference,
            'tour_cover' => $this->tour_cover,
            'price_per_person' => $this->price_per_person,
            'price_two_five' => $this->price_two_five,
            'price_six_twenty' => $this->price_six_twenty,
            'duration' => $this->duration,
        ];
    }
}
