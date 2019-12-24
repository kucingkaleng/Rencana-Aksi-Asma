<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\ZonaTransformer;
use App\Transformers\ZonaShowTransformer;
use App\Zona;
use App\Pilihan;
use App\Helpers\RGP;

class ZonaController extends Controller
{

  public function index()
  {
    $data = Zona::all();
    return RGP::fractal($data,ZonaTransformer::class);
  }

  public function store(Request $req)
  {
    Zona::create($req->all());
    return response()->json('ok');
  }

  public function show($id)
  {
    $zona = Zona::find($id);
    return RGP::fractal($zona,ZonaShowTransformer::class,false);
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy($id)
  {
    //
  }
}
