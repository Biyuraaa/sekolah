<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateConsultationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->role == 'teacher';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'max_appointments' => 'required|integer|min:1',
            'status' => 'required|in:active,inactive',
        ];
    }
}
