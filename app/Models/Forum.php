<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    //
    public function Like()
    {
        return $this->hasMany('App\Models\Like');
    }
    public function forum_message()
    {
        return $this->hasMany('App\Models\forum_message');
    }
    public function User()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
