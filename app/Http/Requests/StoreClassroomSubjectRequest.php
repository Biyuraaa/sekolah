<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreClassroomSubjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->role == "admin";
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "teacher_id" => "required|exists:teachers,id",
            "subject_id" => "required|exists:subjects,id",
            "classroom_id" => "required|exists:classrooms,id",
            "day" => "required|in:monday,tuesday,wednesday,thursday,friday",
            "start_hour" => "required|integer|min:1",
            "end_hour" => "required|integer|min:1|gte:start_hour",
        ];
    }
}
