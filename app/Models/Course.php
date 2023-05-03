<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends BaseModel
{
    use HasFactory;

    public function scopeSearch($query, $request)
    {

        $query->when($request->id, function ($q, $id) {
            $q->where('id', $id);
        });
        $query->when($request->name, function ($q, $name) {
            $q->where('name', $name);
        });
        $query->when($request->code, function ($q, $code) {
            $q->where('code', $code);
        });
        $query->when($request->hours_per_week, function ($q, $hours_per_week) {
            $q->where('hours_per_week', $hours_per_week);
        });
    }
}
