<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserData;
use App\User;
use App\Dokter;

class UserController extends Controller
{

  public function getDokter($id) {
    $user = UserData::where('user',$id)->first();
    $dokters = Dokter::where('pasien', $user->user)->get();
    $dokters->load('data_dokter');
    $user['dokter'] = $dokters;
    return response($user);
  }

  public function getPasien($id) {
    $user = UserData::where('user',$id)->first();
    $pasiens = Dokter::where('dokter', $user->user)->get();
    $pasiens->load('data_pasien');
    $user['pasien'] = $pasiens;
    return response($user);
  }

  public function addPasien(Request $request)
  {
    if ($request->user()->role_id != 2) {
      return response('You are not Dokter', 400);
    }

    $dokter = Dokter::where('pasien', $request->pasien_id)
    ->where('dokter', $request->user()->id)->get();

    if (count($dokter) > 0) {
      return response('Sudah pernah ditambahkan', 400);
    }
    $user = Dokter::create([
      'dokter' => $request->user()->id,
      'pasien' => $request->pasien_id
    ]);
    return response()->json('ok');
  }

  public function deletePasien(Request $request)
  {
    if ($request->user()->role_id != 2) {
      return response('You are not Dokter', 400);
    }

    $dokter = Dokter::where('pasien', $request->pasien_id)
    ->where('dokter', $request->user()->id)->get();

    if (count($dokter) < 1) {
      return response('Tidak ada pasien dengan id tersebut', 400);
    }
    $dokter = Dokter::where('pasien', $request->pasien_id)
    ->where('dokter', $request->user()->id)->first();
    $dokter->delete();
    return response()->json('ok');
  }

  public function index()
  {
    //
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
    $user = UserData::where('user',$id);
    $user->update($request->except(['id']));
    return response()->json('ok');
  }

  public function destroy($id)
  {
    //
  }
}
