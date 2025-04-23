<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    //
    public function Plant_category()
    {
        return $this->belongsTo('App\Models\Plant_category');
    }
    public function Comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function image()
    {
        return $this->hasMany('App\Models\Image');
    }
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
}
