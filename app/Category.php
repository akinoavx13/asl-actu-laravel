<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'color', 'order'
    ];

    public function actualities()
    {
        return $this->hasMany('App\Actuality');
    }

    public function preferences()
    {
        return $this->hasMany('App\Preference');
    }
}
