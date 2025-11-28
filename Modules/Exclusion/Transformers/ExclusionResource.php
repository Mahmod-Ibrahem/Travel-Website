<?php

namespace Modules\Exclusion\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExclusionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */

    public static $wrap = false;
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
