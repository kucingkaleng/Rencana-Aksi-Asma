<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserData;
use Auth;
use App\Obat;
use App\Dosis;

class ObatController extends Controller
{
  public function index()
  {
    $obat = Obat::all();
    return response()->json($obat);
  }

  public function dosis ($id) {
    $user_data = UserData::where('user', Auth::user()->id)->first();
    if ($user_data->usia >= 6 && $user_data->usia <= 11) {
      $usia = 'anak';
    }
    else {
      $usia = 'dewasa';
    }
    $dosis = Dosis::where('obat', $id)
    ->where('usia', $usia)->first();
    return response()->json($dosis);
  }

  public function store(Request $request)
  {
    //
  }

  public function show($id)
  {
    //
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
