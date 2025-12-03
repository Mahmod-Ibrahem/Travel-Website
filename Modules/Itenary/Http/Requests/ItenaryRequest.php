<?php

namespace Modules\Itenary\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItenaryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ];

        if ($this->isMethod('post')) {
            $rules['tour_id'] = 'required|exists:tours,id';
        }

        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
