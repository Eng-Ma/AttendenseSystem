<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenseRequest extends BaseModel
{
    use HasFactory;

    public function scopeSearch($query, $request)
    {

        $query->when($request->id, function ($q, $id) {
            $q->where('id', $id);
        });
        $query->when($request->user_id, function ($q, $user_id) {
            $q->where('user_id', $user_id);
        });
        $query->when($request->time_id, function ($q, $time_id) {
            $q->where('time_id', $time_id);
        });
        $query->when($request->status, function ($q, $status) {
            $q->where('status', $status);
        });
    }

    public function scopeSort($query, $term)
    {
    }
}
