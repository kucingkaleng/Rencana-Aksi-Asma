<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomDokter;
use App\Helpers\RGP;
use Auth;

class DokterController extends Controller
{
  public function __construct () {
    $this->model = new CustomDokter;
  }

  public function index () {
    $data = $this->model->where('user_id', Auth::user()->id)->get();
    return response()->json($data);
  }

  public function create () {
    $this->model->create([
      'user_id' => Auth::user()->id,
      'nama_dokter' => request()->nama,
      'nomor_dokter' => request()->telp
    ]);
    return response()->json('ok');
  }

  public function destroy ($id) {
    $this->model->find($id)->delete();
    return response()->json('deleted', 200);
  }
}
