<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\User;
use App\UserData;

class UserTransformer extends TransformerAbstract
{
  public function transform($user)
  {
    $user_data = UserData::where('user',$user->id)->first();
    return [
      'token' => $user->token,
      'user' => [
        'id' => $user->id,
        'nama' => $user_data->nama,
        'jk' => $user_data->jk,
        'usia' => $user_data->usia,
        'email' => $user->email,
        'role' => $user->role
      ]
    ];
  }
}
