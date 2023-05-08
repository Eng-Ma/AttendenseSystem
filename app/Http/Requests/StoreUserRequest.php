<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'mobile' => 'required|string|unique:users,mobile|max:20',
            'type' => 'sometimes|integer|between:1,4',
            'dob' => 'sometimes|date|before:today',
            // 'password' => 'required|string|min:8|confirmed',
            'password' => 'required|string',
        ];
    }
}
