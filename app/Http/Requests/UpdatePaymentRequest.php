<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->role == "parent";
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
            'amount' => 'required|numeric|min:0|max:99999999.99',
            'purpose' => 'required|string|max:255',
            'proof_of_payment' => 'nullable|image|mimes:jpeg,png,gif|max:10240',
            "payment_method" => "required|in:cash,transfer,e-wallet",
            "month" => "required|in:january,february,march,april,may,june,july,august,september,october,november,december",
            "year" => "required|integer|min:2020|max:2025",
        ];
    }
}
