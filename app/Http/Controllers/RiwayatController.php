<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\RiwayatTransformer;
use App\Helpers\RGP;
use App\Riwayat;

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

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy($id)
  {
    //
  }
}
