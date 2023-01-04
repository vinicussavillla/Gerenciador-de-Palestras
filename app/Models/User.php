<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users'; 

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'password',
        'role'
    ];
    
    // Relaciomentos
     public function endereco()
     {
        return $this->hasOne(Endereco::class);
     } 
     public function telefones()
     {
        return $this->hasMany(Telefone::class);
     } 
     public function palestras()
     {
        return $this->belongsToMany(Palestra::class);
     } 
 

    //Mutators 
    public function setPasswordAttribute($value)
    {
       $this->attributes['password'] = bcrypt($value); 
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
