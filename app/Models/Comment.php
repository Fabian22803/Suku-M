<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function Like()
    {
        return $this->hasMany('App\Models\Like');
    }
    public function plant()
    {
        return $this->belongsTo('App\Models\Plant');
    }

}
