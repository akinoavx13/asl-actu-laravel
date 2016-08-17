<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'preference_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function preference()
    {
        return $this->belongsTo('App\Preference');
    }

    public function actualities()
    {
        return $this->hasMany('App\Actuality');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
