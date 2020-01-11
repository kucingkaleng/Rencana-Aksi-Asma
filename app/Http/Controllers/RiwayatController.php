<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\RiwayatTransformer;
use App\Helpers\RGP;
use App\Riwayat;
use App\RiwayatDokter;
use Auth;

class RiwayatController extends Controller
{
  public function index()
  {
    //
  }

  public function store(Request $request)
  {
    $riwayat = Riwayat::create($request->all());
    return response()->json('ok');
  }

  public function show($user_id, Request $req)
  {
    $date = $req->get('date');

    $page = $req->get('page'); //current page
    $per_page = 10;

    if ($page == null || $page == 0 || $page == 1) {
      $page = 1;
    }

    $skip = $page == 1 ? 0 : ($page-1)*$per_page;

    if ($date != null) {
      $riwayat = $this->filter($user_id, $req);
    }
    else {
      $riwayat = Riwayat::where('user', $user_id)
      ->take(200)
      ->orderBy('created_at','desc')
      ->get();
    }

    $serialize = RGP::fractal($riwayat,RiwayatTransformer::class);
    return RGP::arrayToPage($page,$per_page,$serialize);
  }

  public function filter($id, Request $req) {
    $riwayat = Riwayat::where('user', $id)
    ->whereDate('created_at',$req->get('date'))
    ->take(200)
    ->orderBy('created_at','desc')
    ->get();

    return $riwayat;
  }

  public function getRiwayatDokter () {
    $eager = ['data_pasien','data_pasien.data', 'data_dokter', 'data_dokter.data'];

    if (request()->get('id') != null) {
      $data = $this->showRiwayatDokter(request()->get('id'), $eager);
      return response()->json($data);
    }

    if (request()->get('id_dokter') != null) {
      $data = RiwayatDokter::with($eager)->where('id_dokter', request()->get('id_dokter'))->get();
      return response()->json($data);
    }

    if (request()->get('id') == null && request()->get('id_pasien') == null && request()->get('id_dokter') == null) {
      return response()->json([
        'message' => 'gunakan salah satu param (id, id_dokter atau id_pasien)'
      ], 400);
    }

    $data = RiwayatDokter::with($eager)->where('id_pasien', request()->get('id_pasien'))->get();
    return response()->json($data);
  }

  public function storeRiwayatDokter () {
    RiwayatDokter::create([
      'id_pasien' => request()->id_pasien,
      'id_dokter' => Auth::user()->id,
      'derajat_asma' => request()->derajat_asma,
      'obat' => json_encode(request()->obat),
    ]);

    return response()->json('ok');
  }

  public function showRiwayatDokter ($id, $eager) {
    $data = RiwayatDokter::with($eager)->where('id', $id)->first();
    return $data;
  }

  public function destroyRiwayatDokter ($id) {
    $data = RiwayatDokter::where('id', $id)->delete();
    return response()->json('deleted');
  }
}
