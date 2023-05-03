<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenseRequest extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'time_id',
        'reason',
        'status',
    ];

    public function scopeSearch($query, $request)
    {

        $query->when($request->id, function ($q, $id) {
            $q->whereIn('id', $id);
        });
        $query->when($request->user_id, function ($q, $user_id) {
            $q->whereIn('user_id', $user_id);
        });
        $query->when($request->time_id, function ($q, $time_id) {
            $q->whereIn('time_id', $time_id);
        });
        $query->when($request->status, function ($q, $status) {
            $q->whereIn('status', $status);
        });
    }

    public function scopeSort($query, $term)
    {
    }
}
