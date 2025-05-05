<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles'; // Nombre de la tabla en la base de datos
    protected $fillable = [
        'name',
        'description',
        'state',
    ];
    public function User()
    {
        return $this->belongsToMany('App\Models\User');
    }
    
}
