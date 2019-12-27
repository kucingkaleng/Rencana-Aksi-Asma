<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
  protected $table = 'riwayat';
  protected $guarded = ['id'];
  public $timestamps = true;

  public function zonas () {
    return $this->belongsTo('App\Zona','zona');
  }

  public function getChoiceAttribute ($value) {
    if ($value == 1) {
      return 'membaik';
    }
    return 'tidak membaik';
  }
}
