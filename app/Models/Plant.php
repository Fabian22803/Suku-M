<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $table = 'plants';
    protected $fillable = [
        'name',
        'scientific_name',
        'description',
        'benefits',
        'image',
        'users_id'
    ];
    //
  
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
    public function recipes()
    {
        return $this->hasMany('App\Models\Recipe');
    }
}
