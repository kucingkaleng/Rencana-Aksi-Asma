<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RiwayatDokter extends Model
{
  protected $table = 'riwayat_dokter';
  protected $guarded = ['id'];
  // public $timestamps = false;

  protected $casts = [
    'obat' => 'array',
  ];

  public $derajat = [
    [
      'id' => 'intermiten',
      'name' => 'Ringan'
    ],
    [
      'id' => 'persisten ringan',
      'name' => 'Sedang'
    ],
    [
      'id' => 'persisten sedang',
      'name' => 'Berat'
    ],
    [
      'id' => 'persisten berat',
      'name' => 'Ancaman Henti Napas'
    ]
  ];

  public function data_pasien () {
    return $this->belongsTo(User::class, 'id_pasien');
  }

  public function data_dokter () {
    return $this->belongsTo(User::class, 'id_dokter');
  }

  public function getCreatedAtAttribute ($value) {
    return [
      'human' => Carbon::parse($value)->format('Y-m-d H:i:s'),
      'tahun' => Carbon::parse($value)->format('Y'),
      'bulan' => Carbon::parse($value)->format('m'),
      'hari' => Carbon::parse($value)->format('d'),
      'waktu' => Carbon::parse($value)->format('H:i:s')
    ];
  }

  public function getDerajatAsmaAttribute ($value) {
    foreach ($this->derajat as $x => $i) {
      if ($value == $i['id']) {
        $final = (object) [
          'id' => ucfirst($value),
          'name' => $i['name']
        ];
      }
    }
    return $final;
  }
}
