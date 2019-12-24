<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
  protected $table = 'dokter';
  protected $guarded = ['id'];
  public $timestamps = false;
  protected $hidden = ['dokter','pasien'];

  public function data_dokter () {
    return $this->hasOne(UserData::class,'user','dokter');
  }

  public function data_pasien () {
    return $this->hasOne(UserData::class,'user','pasien');
  }
}
