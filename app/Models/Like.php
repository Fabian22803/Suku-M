<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function Comment()
    {
        return $this->belongsTo('App\Models\Comment');
    }
    public function Image()
    {
        return $this->belongsTo('App\Models\Image');
    }
    public function forum()
    {
        return $this->belongsTo('App\Models\Forum');
    }
}
