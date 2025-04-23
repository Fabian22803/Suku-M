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
        'email',
        'password',
        'Last_name1', // Primer apellido
        'Last_name2', // Segundo apellido
        'phone',      // Teléfono
        'address',    // Dirección
        'role',       // Rol del usuario
        
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
            'registration_date' => 'datetime', // Asegúrate de que este campo sea tratado como fecha
        ];
    }
    public function comment()
    {
        return $this->hasMany('App\Models\comment');
    }

    public function Notification()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function Statistic()
    {
        return $this->hasMany('App\Models\Statistic');
    }

    public function fourum_message()
    {
        return $this->hasMany('App\Models\fourum_message');
    }

    public function Like()
    {
        return $this->hasMany('App\Models\Like');
    }
    public function forum()
    {
        return $this->belongsToMany('App\Models\Forum');
    }
    public function Role()
    {
        return $this->belongsToMany('App\Models\Role');
    }
    public function plant()
    {
        return $this->belongsToMany('App\Models\plant');
    }
}
