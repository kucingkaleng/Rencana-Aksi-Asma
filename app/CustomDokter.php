<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomDokter extends Model
{
  protected $table = 'custom_dokter';
  protected $guarded = ['id'];
  public $timestamps = false;

  public function user () {
    return $this->belongsTo(User::class);
  }
}
