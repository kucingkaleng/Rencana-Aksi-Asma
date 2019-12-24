<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
  protected $table = 'obat';
  protected $guarded = ['id'];
  public $timestamps = false;
}
