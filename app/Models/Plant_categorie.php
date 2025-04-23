<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant_categorie extends Model
{
    //
    public function Plant()
    {
        return $this->hasMany('App\Models\Plant');
    }

}
