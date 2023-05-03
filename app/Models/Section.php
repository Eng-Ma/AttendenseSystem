<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'teacher_id',
        'absense_tolerance',
    ];

    public function scopeSearch($query, $request)
    {

        $query->when($request->id, function ($q, $id) {
            $q->whereIn('id', $id);
        });
        $query->when($request->course_id, function ($q, $course_id) {
            $q->whereIn('course_id', $course_id);
        });
        $query->when($request->teacher_id, function ($q, $teacher_id) {
            $q->whereIn('teacher_id', $teacher_id);
        });
        $query->when($request->absence_tolerance, function ($q, $absence_tolerance) {
            $q->where('absence_tolerance', '>=', $absence_tolerance);
        });
    }
}
