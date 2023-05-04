<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSectionRequest extends FormRequest
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
            'course_id' => 'sometimes|exists:courses,id',
            'teacher_id' => 'sometimes|exists:users,id',
            // 'absense_tolerance' => 'required|numeric|min:0|max:1', // its not an input field, its calculated
        ];
    }
}
