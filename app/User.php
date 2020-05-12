<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
        'picture', 'user_type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Hashes password
     * @param $value
     */
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getCreatedAtAttribute($value) {
        return date('D, M d, Y', strtotime($value));
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getUpdatedAtAttribute($value) {
        return date('D, M d, Y', strtotime($value));
    }

    /**
     * A user belongs to a type
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_type(){
        return $this->belongsTo(UserType::class);
    }

    /**
     * A user has many startups
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function startups(){
        return $this->hasMany(Startup::class);
    }

}
