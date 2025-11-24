<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => ['required', 'string', 'min:10', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'communication' => 'required|in:email,phone',
            'message' => 'required|string',
            'g-recaptcha-response' => ['required', function ($attribute, $value, $fail) {
                $secretKey = config('services.recaptcha.secret_key');
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$value}");
                $responseKeys = json_decode($response, true);
                if (intval($responseKeys["success"]) !== 1) {
                    $fail('The google recaptcha verification failed.');
                }
            }],
        ];
    }
}
