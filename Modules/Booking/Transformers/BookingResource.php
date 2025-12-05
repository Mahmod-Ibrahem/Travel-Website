<?php

namespace Modules\Booking\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class BookingResource extends JsonResource
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
            'tour_id' => $this->tour_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'tour_group' => $this->tour->group,
            'tour_title' => $this->tour->title,
            'date' => Carbon::parse($this->date)->format('d-m-Y'),
            'total_price' => $this->total_price,
            'country' => $this->country,
            'adult' => $this->adult,
            'children' => $this->children,
        ];
    }
}
