<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateExamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "subject_id" => "required|exists:subjects,id",
            "type" => "required|in:uts,uas",
            "date" => "required|date",
            "start_time" => "required|date_format:H:i",
            "end_time" => "required|date_format:H:i",
            "academic_year" => "required|string",
        ];
    }
}
