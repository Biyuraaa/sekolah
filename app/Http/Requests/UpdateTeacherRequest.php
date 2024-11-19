<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateTeacherRequest extends FormRequest
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
            "name" => "required | string | max:255",
            "email" => "required | email | max:255 | unique:users,email",
            "password" => "nullable | string | min:8 | confirmed",
            "phone_number" => "required|string|regex:/^[0-9]{10,15}$/",
            "date_of_birth" => "required | date",
            "address" => "required|string|max:1000",
            "image" => "nullable|image|mimes:jpg,jpeg,png|max:2048",
            "subject_id" => "required | exists:subjects,id",
        ];
    }
}
