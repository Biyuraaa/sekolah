<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreClassroomRequest extends FormRequest
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
            //
            "year_level" => ["required", "string", "in:10,11, 12"],
            "group_numbers" => ["required", "string", "in:1,2,3,4,5,6,7,8,9,10"],
            "batch_name" => ["nullable", "string", "max:255"],
            "academic_year" => ["required", "string", "max:255"],
            "teacher_id" => ["required", "integer", "exists:teachers,id"],
        ];
    }
}
