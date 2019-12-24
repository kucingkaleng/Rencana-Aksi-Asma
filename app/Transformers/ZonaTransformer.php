<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Zona;

class ZonaTransformer extends TransformerAbstract
{
  public function transform(Zona $zona)
  {
    $zona->gejala = json_decode($zona->gejala,true);

    return [
      'id' => $zona->id,
      'nama' => $zona->alias.' ('.$zona->nama.')',
      'gejala' => $zona->gejala
    ];
  }
}
