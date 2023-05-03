<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSection extends BaseModel
{
    use HasFactory;

    public function scopeSearch($query, $request)
    {

        $query->when($request->id, function ($q, $id) {
            $q->where('id', $id);
        });
        $query->when($request->user_id, function ($q, $user_id) {
            $q->whereIn('user_id', $user_id);
        });
        $query->when($request->section_id, function ($q, $section_id) {
            $q->whereIn('section_id', $section_id);
        });
        $query->when($request->status, function ($q, $status) {
            $q->where('status', $status);
        });
        $query->when($request->absence_times, function ($q, $absence_times) {
            $q->where('absence_times', $absence_times);
        });
    }
}
