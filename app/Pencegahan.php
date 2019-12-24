<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pencegahan extends Model
{
  protected $table = 'pencegahan';
  protected $guarded = ['id'];
  public $timestamps = false;
}
