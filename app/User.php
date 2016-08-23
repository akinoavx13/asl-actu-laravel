<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'forname', 'email', 'password', 'role', 'avatar', 'newsletter'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'newsletter' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();
        static::deleted(function ($instance) {
            if ($instance->avatar) {
                File::delete(public_path() . $instance->avatar);
            }

            return true;
        });
    }

    public function getAvatarAttribute($avatar)
    {
        if ($avatar) {
            return "/img/avatars/{$this->id}.jpg";
        }

        return false;
    }

    public function setAvatarAttribute($avatar)
    {
        if (is_object($avatar) && $avatar->isValid()) {
            ImageManagerStatic::make($avatar)->fit(200)->save(public_path() . "/img/avatars/{$this->id}.jpg");
            $this->attributes['avatar'] = 1;
        }
    }

    public function preferences()
    {
        return $this->hasMany('App\Preference');
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
