<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'type',
        'dob',
        'avater',
    ];

    protected $with = [
        'sections',
        'attendences',
        'absenseRequest',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function scopeSearch($query, $request)
    {
        // dd($request);
        $query->when($request->type, function ($qu, $type) {
            $qu->whereIn('type', $type);
        });
        $query->when($request->id, function ($q, $id) {
            $q->whereIn('id', $id);
        });
        $query->when($request->email, function ($q, $email) {
            $q->where('email', $email);
        });
        $query->when($request->mobile, function ($q, $mobile) {
            $q->where('mobile', $mobile);
        });
        $query->when($request->name, function ($q, $name) {
            $q->where('name', $name);
        });
        $query->when($request->dob, function ($q, $dob) {
            $q->whereDate('dob', $dob);
        });
        // dd($query);
    }

    public function scopeSort($query, $term)
    {
    }

    public function isset()
    {
    }

    public function sections(){
        return $this->belongsToMany(Section::class, "user_sections");
    }
    public function attendences(){
        return $this->hasMany(Attendence::class);
    }
    public function absenseRequest(){
        return $this->hasMany(AbsenseRequest::class);
    }
}
