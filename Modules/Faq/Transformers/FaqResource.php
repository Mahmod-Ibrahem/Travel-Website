<?php

namespace Modules\Faq\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap=false;
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->translations[0]->id,
            'question' => $this->translations[0]->question,
            'answer' => $this->translations[0]->answer,
            'locale' => $this->translations[0]->locale
        ];
    }
}
