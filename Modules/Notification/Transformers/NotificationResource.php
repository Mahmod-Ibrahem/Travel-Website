<?php

namespace Modules\Notification\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
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
