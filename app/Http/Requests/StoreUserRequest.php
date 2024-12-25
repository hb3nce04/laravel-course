<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|string|email|min:6|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed:password2',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string|min:6|max:45|unique:users',
        ];
    }
}