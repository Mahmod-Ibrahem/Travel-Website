<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DTourRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return
        [
            'Tourtype'=>'bail|required',
            'OfferType'=>"bail|required",
            'city'=>'bail|required',
            'title'=>'bail|min:5|max:100|required',
            'places'=>'bail|required|min:5|max:100',
            'price'=>'bail|required|gt:0',
            'path'=>'bail|image|mimes:jpg,jpeg,png',
            'itenary_title'=>'bail|required',
            'itenary_section'=>'bail|required',
            'included'=>'bail|required',
            'excluded'=>'bail|required',
            'Duration'=>'bail|required|string',
            'MaxPeople'=>'bail|required|numeric',
            'Popular'=>'bail|required'
        ];
    }
}
