<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttendenceRequest extends FormRequest
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
            'attendance_at' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'time_date_id' => 'required|exists:time_dates,id',
            'absense_request_id' => 'nullable|exists:absense_requests,id',
        ];
    }
}
