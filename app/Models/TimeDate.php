<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeDate extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time_id',
        'is_holiday',
    ];

    public function scopeSearch($query, $request)
    {

        $query->when($request->id, function ($q, $id) {
            $q->whereIn('id', $id);
        });
        $query->when($request->time_id, function ($q, $time_id) {
            $q->whereIn('time_id', $time_id);
        });
        $query->when($request->date, function ($q, $date) {
            $q->whereDate('date', $date);
        });
        $query->when($request->is_holiday, function ($q, $is_holiday) {
            $q->where('is_holiday', $is_holiday);
        });
    }
}
