<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location_id' => 'required|exists:locations,id',
            'person_id' => 'required|exists:people,id',
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
            'total' => 'required|numeric',
            // 'note' => 'nullable|string',
            // 'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'The user ID is required.',
            'user_id.exists' => 'The selected user does not exist.',
            'date.required' => 'The date field is required.',
            'date.date' => 'The date must be a valid date.',
            'time.required' => 'The time field is required.',
            'time.date_format' => 'The time must be in the "hour:minute" format.',
            'location_id.required' => 'The location field is required.',
            'location_id.exists' => 'The selected location does not exist.',
            'person_id.required' => 'The person field is required.',
            'person_id.exists' => 'The selected person does not exist.',
            'services.required' => 'At least one service must be selected.',
            'services.*.exists' => 'One or more of the selected services does not exist.',
            'total.required' => 'The total field is required.',
            'total.numeric' => 'The total must be a number.',
        ];
    }
}
