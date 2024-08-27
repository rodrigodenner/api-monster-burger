<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
        'email' => 'required|email|unique:customers,email',
        'phone_number' => 'required|string|max:25|unique:customers,phone_number',
        'address' => 'required|string|max:255',
        'password' => 'required|string|min:6',
      ];
    }
}
