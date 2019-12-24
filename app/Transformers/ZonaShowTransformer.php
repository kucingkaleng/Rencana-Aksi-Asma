<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Pilihan;

class ZonaShowTransformer extends TransformerAbstract
{
  public function transform($zona)
  {
    $pilihan = Pilihan::where('zona',$zona->id)
    ->get()->sortBy('order')->toArray();

    return [
      'id' => $zona->id,
      'nama' => $zona->alias.' ('.$zona->nama.')',
      'pilihan' => $pilihan
    ];
  }
}
