<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'attendance_at',
        'time_date_id',
        'absense_request_id',
    ];

    public function scopeSearch($query, $request)
    {

        $query->when($request->id, function ($q, $id) {
            $q->whereIn('id', $id);
        });
        $query->when($request->user_id, function ($q, $user_id) {
            $q->whereIn('user_id', $user_id);
        });
        $query->when($request->attendance_at, function ($q, $attendance_at) {
            $q->whereDate('attendance_at', $attendance_at);
        });
        $query->when($request->time_date_id, function ($q, $time_date_id) {
            $q->whereIn('time_date_id', $time_date_id);
        });
        $query->when($request->absense_request_id, function ($q, $absense_request_id) {
            $q->whereIn('absense_request_id', $absense_request_id);
        });
    }
}
