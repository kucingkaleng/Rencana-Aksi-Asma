<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosis extends Model
{
  protected $table = 'dosis';
  protected $guarded = ['id'];
  public $timestamps = false;

  public function obat () {
    return $this->belongsTo('App\Obat', 'obat');
  }
}
