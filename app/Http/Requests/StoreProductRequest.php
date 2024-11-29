<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
        return [
            'category_id' => 'nullable',
            'group' => 'required',
            'preference' => 'nullable',
            'title' => 'required',
            'description' => 'required',
            'tour_cover' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            'tour_images' => 'required|array', // Ensure tour_images is an array
            'tour_images.*' => 'required|image|', // Validate each file in the array
            'places' => 'required',
            'itenary_title' => 'required',
            'itenary_section' => 'required',
            'locations'=>'required|json',
            'included' => 'required',
            'excluded' => 'required',
            'duration' => 'required',
            'price_per_person' => 'required',
            'price_two_five' => 'required',
            'price_six_twenty'=> 'required'
        ];

    }

    protected function prepareForValidation() //runs before Validation
    {
        // Safely handle `locations` to ensure it's properly transformed if present
        $locations = $this->locations;

        $this->merge([
            'locations' => json_encode(array_map('trim', explode('/', $locations))),
        ]);
    }
}
