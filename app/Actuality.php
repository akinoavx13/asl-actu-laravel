<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic;

class Actuality extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'message', 'user_id', 'actuality_id', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
    ];

    public static function boot()
    {
        parent::boot();
        static::deleted(function ($instance) {
            if ($instance->image) {
                unlink(public_path() . $instance->image);
            }

            return true;
        });
    }

    public function getImageAttribute($photo)
    {
        if ($photo) {
            return "/img/actualities/{$this->id}.jpg";
        }

        return false;
    }

    public function setImageAttribute($photo)
    {
        if (is_object($photo) && $photo->isValid()) {

            $image = ImageManagerStatic::make($photo);

            if ($image->width() > 200 && $image->height() > 200) {
                $max = $image->width() > $image->height() ? 'width' : 'height';

                if ($max == 'width') {
                    $image->resize(200, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                } else {
                    $image->resize(null, 200, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            } elseif ($image->width() < 200 && $image->height() > 200) {
                $image->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                });
            } elseif ($image->width() > 200 && $image->height() < 200) {
                $image->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            $image->save(public_path() . "/img/actualities/{$this->id}.jpg");
            $this->attributes['image'] = 1;
        }
    }

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
