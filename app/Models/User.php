<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use HasFactory, Notifiable, HasApiTokens;


    protected $guarded = [] ;

    public function events(){
      return $this->hasMany(EventUser::class , 'user_id');
    }
    public function parties(){
        return $this->hasMany(Party::class , 'user_id');
    }

    public function country(){
        return $this->belongsTo(Country::class , 'country_id');
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];



    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
