<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
  protected $table = 'zona';
  protected $guarded = ['id'];
  public $timestamps = false;

  public function getGejalaAttribute ($value) {
    return \json_decode($value);
  }
}
