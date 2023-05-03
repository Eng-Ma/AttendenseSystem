<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimeRequest extends FormRequest
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
            'day' => 'required|integer|min:0|max:6',
            'start_time' => 'required|date_format:H:i:s',
            'duration' => 'required|numeric|min:0',
            'section_id' => 'required|exists:sections,id',
        ];
    }
}
