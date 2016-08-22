<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actuality extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'message', 'user_id', 'actuality_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
    ];

    public function comments()
    {
        return $this->hasMany('App\Actuality');
    }

    public function post()
    {
        return $this->belongsTo('App\Actuality');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
