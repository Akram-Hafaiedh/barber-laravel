<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
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
            'role' => 'required|in:admin,manager,coach,athlete',
            'location_id' => 'required|exists:locations,id',

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name is required',
            'name.string' => 'The name should be a string',
            'name.max' => 'The name may not be greater than 255 characters',
            'role.required' => 'The role is required',
            'role.in' => 'The role is not valid',
            'location_id.required' => 'The location is required',
            'location_id.exists' => 'The location does not exist',
        ];
    }
}
