<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email|max:255',
            'mobile' => 'sometimes|string|unique:users,mobile|max:20',
            'type' => 'sometimes|integer|between:1,4',
            'dob' => 'sometimes|date|before:today',
        ];
    }
}
