<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'name',
        'email',
        'phone', 
        'avatar', 
        'password',
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

    protected $dates = ['created_at', 'updated_at', 'email_verified_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->setCreatedAt(Carbon::now('Asia/Ho_Chi_Minh'));
            $model->setUpdatedAt(Carbon::now('Asia/Ho_Chi_Minh'));
            $model->setAttribute('remember_token', \Illuminate\Support\Str::random(10));
            $model->setAttribute('email_verified_at', Carbon::now('Asia/Ho_Chi_Minh'));
        });

        static::updating(function ($model) {
            $model->setUpdatedAt(Carbon::now('Asia/Ho_Chi_Minh'));
        });
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}

