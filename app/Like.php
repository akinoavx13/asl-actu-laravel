<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'actuality_id'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function actuality()
    {
        return $this->belongsTo('App\Actuality');
    }
}
