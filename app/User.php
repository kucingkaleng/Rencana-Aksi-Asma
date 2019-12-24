<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
  use Notifiable;

  protected $guarded = ['id'];

  protected $hidden = ['password','created_at','updated_at'];


  public function role () {
    return $this->belongsTo(UserRole::class);
  }

  public function data () {
    return $this->hasOne(UserData::class, 'user');
  }

  public function setPasswordAttribute ($value) {
    $this->attributes['password'] = bcrypt($value);
  }

  public function getJWTIdentifier()
  {
    return $this->getKey();
  }

  public function getJWTCustomClaims()
  {
    return [];
  }
}
