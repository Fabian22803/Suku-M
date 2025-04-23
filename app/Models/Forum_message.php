<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum_message extends Model
{
    //
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function forum()
    {
        return $this->belongsTo('App\Models\Forum');
    }
}
