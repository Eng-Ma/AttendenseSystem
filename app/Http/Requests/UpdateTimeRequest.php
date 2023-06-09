<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTimeRequest extends FormRequest
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
            'day' => 'sometimes|integer|min:0|max:6',
            'start_time' => 'sometimes|date_format:H:i:s',
            'duration' => 'sometimes|numeric|min:0',
            'section_id' => 'sometimes|exists:sections,id',
        ];
    }
}
