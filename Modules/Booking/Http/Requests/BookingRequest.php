<?php

namespace Modules\Booking\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'adult' => 'required|numeric|min:1',
            'children' => 'required|numeric|min:0',
            'students' => 'required|numeric|min:0',
            'date' => 'required|date',
            'country' => 'required',
            'hotel' => 'required',
            'payment_method' => 'required',
            'tour_id' => 'required|exists:tours,id',
            // 'g-recaptcha-response' => ['required', new \App\Rules\Recaptcha],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'phone.required' => 'Phone number is required.',
            'prefix.required' => 'Code is required.',
            'adult.required' => 'Adult is required.',
            'children.required' => 'Children is required.',
            'date.required' => 'Date is required.',
            'country.required' => 'Country is required.',
            'tour_id.required' => 'Tour ID is required.',
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA.',
        ];
    }
}
