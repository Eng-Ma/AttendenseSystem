<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'day',
        'start_time',
        'duration',
        'section_id',
    ];

    public function scopeSearch($query, $request)
    {

        $query->when($request->id, function ($q, $id) {
            $q->whereIn('id', $id);
        });
        $query->when($request->start_time, function ($q, $start_time) {
            $q->whereDate('start_time', $start_time);
        });
        $query->when($request->day, function ($q, $day) {
            $q->whereIn('day', $day);
        });
        $query->when($request->duartion, function ($q, $duartion) {
            $q->where('duartion', $duartion);
        });
        $query->when($request->section_id, function ($q, $section_id) {
            $q->whereIn('section_id', $section_id);
        });
    }
}
