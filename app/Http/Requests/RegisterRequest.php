<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'name' => 'required|unique:clients' ,
            // 'phone' => 'required|numeric' ,
            // 'password' => 'required|confirmed|min:8' ,
            // 'email' => 'required|confirmed|unique:clients' ,
            // 'd_o_b' => 'required' ,
            // 'pin_num' => 'numeric' ,
            // 'last_donation_date' => 'required' ,
            // 'blood_type' => 'required|in:O-,O+,A-,A+,B-,B+,AB-,AB+' ,
            // 'city_id' => 'required' ,
            // 'api_token' => 'nullable|' ,
        ];
    }
}
