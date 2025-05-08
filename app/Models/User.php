<?php

namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'lastName',
        'email',
        'password',
        'phone',
        'address',
        'role',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Removed duplicate $fillable declaration
    
  

    public function comments()
    {
        return $this->hasMany('App\Models\comment');
    }

    public function Notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function Statistics()
    {
        return $this->hasMany('App\Models\Statistic');
    }

    public function fourum_messages()
    {
        return $this->hasMany('App\Models\fourum_message');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
    public function forums()
    {
        return $this->belongsToMany('App\Models\Forum');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
    public function plant()
    {
        return $this->belongsToMany('App\Models\plant');
    }
    public function hasRole($roleName)
    {
        return $this->roles()->where('name', $roleName)->exists();
    }
    public function recipes()
    {
        return $this->hasMany('App\Models\Recipe');
    }
   
 
}
