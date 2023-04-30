<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenseRequest extends BaseModel
{
    use HasFactory;

    public function scopeSearch($query, $term)
    {
    }

    public function scopeSort($query, $term)
    {
    }
}
