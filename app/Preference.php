<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'general', 'athletics', 'badminton', 'basketball', 'football', 'gym', 'yoga_cestas', 'ball', 'soccer5', 'tennis', 'volleyball', 'yoga_chalgrin'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
