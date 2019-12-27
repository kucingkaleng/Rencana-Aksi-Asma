<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Riwayat;
use Carbon\Carbon;

class RiwayatTransformer extends TransformerAbstract
{
  public function transform(Riwayat $riwayat)
  {
    return [
      'zona' => [
        'id' => $riwayat->zonas->id,
        'nama' => $riwayat->zonas->nama,
        'alias' => $riwayat->zonas->alias
      ],
      'pilihan' => $riwayat->choice,
      'keterangan' => 'Telah '.$riwayat->action_count.'x mencoba',
      'tanggal' => [
        'human' => Carbon::parse($riwayat->created_at)->format('Y-m-d H:i:s'),
        'tahun' => Carbon::parse($riwayat->created_at)->format('Y'),
        'bulan' => Carbon::parse($riwayat->created_at)->format('m'),
        'hari' => Carbon::parse($riwayat->created_at)->format('d'),
        'waktu' => Carbon::parse($riwayat->created_at)->format('H:i:s')
      ]
    ];
  }
}
