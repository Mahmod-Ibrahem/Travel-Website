<?php

namespace Modules\Tour\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'category_id' => 'nullable',
            'group' => 'required',
            'preference' => 'nullable',
            'title' => 'required',
            'description' => 'required',
            'places' => 'required',
            'itenary_title' => 'required',
            'itenary_section' => 'required',
            'locations' => 'required',
            'included' => 'required',
            'excluded' => 'required',
            'duration' => 'required',
            'price_per_person' => 'required',
            'price_two_five' => 'required',
            'price_six_twenty' => 'required',
            'deleted_images_ids' => 'nullable|array',
        ];

        if ($this->isMethod('POST')) {
            $rules['tour_cover'] = 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048';
            $rules['tour_images'] = 'required|array';
            $rules['tour_images.*'] = 'required||image';
        } else {
            $rules['tour_cover'] = 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048';
            $rules['tour_images'] = 'nullable|array';
        }
        return $rules;
    }
}
