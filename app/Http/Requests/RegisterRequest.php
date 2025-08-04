<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'Please provide your name.',
            'name.string'       => 'Name must be a valid string.',
            'name.max'          => 'Name should not exceed 255 characters.',

            'email.required'    => 'Email is required for registration.',
            'email.email'       => 'Please enter a valid email address.',
            'email.unique'      => 'This email is already registered.',

            'password.required' => 'Password is required.',
            'password.min'      => 'Password must be at least 6 characters.',
            'password.confirmed'=> 'Password confirmation does not match.',
        ];
    }
}
