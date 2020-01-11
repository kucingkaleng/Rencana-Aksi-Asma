<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatDokter extends Model
{
  protected $table = 'riwayat_dokter';
  protected $guarded = ['id'];
  public $timestamps = false;
}
