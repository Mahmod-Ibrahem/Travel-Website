<?php

namespace Modules\Notification\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tour_id' => $this->data['tour_id'],
            'booking_id' => $this->data['booking_id'],
            'date' => $this->data['date'],
            'title' => $this->data['title'],
            'read_at' => $this->read_at,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
