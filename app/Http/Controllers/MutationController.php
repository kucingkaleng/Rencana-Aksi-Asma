<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LastChoice;
use App\Riwayat;
use App\Zona;

class MutationController extends Controller
{
  function __construct () {
    $this->states = [];
    $this->middleware(function ($request, $next) {
      $this->user = auth()->user();
      $this->lastChoice = LastChoice::where('user_id',$this->user->id)->first();
      if (!$this->lastChoice) {
        $this->states['active_zone'] = null;
      }
      else {
        $this->states['active_zone'] = $this->lastChoice->zona_id;
      }
      return $next($request);
    });
    
  }

  public function ActionSaveLastZona ($id) {
    if ($this->states['active_zone']) {
      LastChoice::find($this->lastChoice->id)->delete();
    }
    LastChoice::create([
      'zona_id' => $id,
      'user_id' => $this->user->id,
      'action_count' => 1
    ]);
    return response()->json('ok');
  }

  public function MutationZonaAction()
  {
    if ($this->states['active_zone'] == null) {
      return response()->json('Tidak ada zona terakhir yang disimpan',400);
    }

    if (!in_array(request()->choice,[1,0])) {
      return response()->json('pilihan hanya boleh 1 atau 0', 400);
    }

    $actionCount = $this->lastChoice->action_count;

    $riwayat = Riwayat::create([
      'user' => $this->user->id,
      'zona' => $this->lastChoice->zona_id,
      'choice' => request()->choice,
      'action_count' => $actionCount
    ]);

    $tindakan = $this->tindakan($actionCount, request()->choice, $this->lastChoice->zona_id);

    if (\request()->choice == 0) {
      LastChoice::find($this->lastChoice->id)->update([
        'action_count' => $actionCount+=1
      ]);
    }
    
    else if (request()->choice == 1 || $actionCount == 2) {
      LastChoice::find($this->lastChoice->id)->delete();
    }

    $response = [
      'action' => $tindakan->response,
      'features' => $tindakan->features
    ];
    return response()->json($response);
  }

  public function tindakan ($actionCount, $choice, $zona_id) {
    $zona = Zona::find($zona_id);

    if ($actionCount == 1 && $choice == 1) {
      $response = [
        'status' => $zona->mutations->yes->status,
        'message' => $zona->mutations->yes->message,
        'value' => $zona->mutations->yes->value
      ];
    }
    else if ($actionCount == 1 && $choice == 0) {
      $response = [
        'status' => $zona->mutations->no->status,
        'message' => $zona->mutations->no->message,
        'value' => $zona->mutations->no->value
      ];
    }
    else if ($actionCount == 2 && $choice == 1) {
      $response = [
        'status' => $zona->mutations->yes->status,
        'message' => $zona->mutations->yes->message,
        'value' => $zona->mutations->yes->value
      ];
    }
    else if ($actionCount == 2 && $choice == 0) {
      $response = [
        'status' => $zona->mutations->no->next->status,
        'message' => $zona->mutations->no->next->message,
        'value' => $zona->mutations->no->next->value
      ];
    }

    return (object) [
      'response' => $response,
      'features' => $zona->mutations->features
    ];
  }
}
