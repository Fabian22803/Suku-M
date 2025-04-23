<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    public function Like()
    {
        return $this->hasMany('App\Models\Like');
    }
    public function Plant()
    {
        return $this->belongsTo('App\Models\Plant');
    }

}
