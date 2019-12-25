<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\UserTransformer;
use App\Helpers\RGP;
use App\User;
use App\UserData;
use Auth; 
use Validator;

class AuthController extends Controller
{
  public $okStatus = 200;

  public function login() {
    $credentials = request(['email', 'password']);
    if($token = auth()->attempt($credentials)){ 
      $user = Auth::user();

      if ($user->api_token != null) {
        $token = $user->api_token;
      }
      else {
        $u = User::find($user->id);
        $u->api_token = $token;
        $u->update();
      }
    
      $user->token = $token;
      $user->load('role');
      return RGP::fractal($user,UserTransformer::class,false);
      // return response()->json(['access_token' => $token, 'user' => $user], $this->okStatus); 
    } 
    else{ 
      return response()->json(['error'=>'Unauthorized'], 401); 
    } 
  }

  public function register(Request $request) { 
    if ($request->role_id == 1) {
      $validator = Validator::make($request->all(), [ 
        'nama' => 'required',
        'usia' => 'required',
        'jk' => 'required',
        'email' => 'required|email|unique:users', 
        'password' => 'required', 
      ]);
    }
    else {
      $validator = Validator::make($request->all(), [ 
        'nama' => 'required',
        'nomor_hp' => 'required',
        'email' => 'required|email|unique:users', 
        'password' => 'required', 
      ]);
    }

    if ($validator->fails()) { 
      return response()->json(['error'=>$validator->errors()], 401);            
    }

    $input = $request->except(['nama','usia','jk','nomor_hp']);
    $input['password'] = $input['password']; 
    $user = User::create($input);

    $input = $request->except(['email','password','role_id']);
    $input['user'] = $user->id;
    $user_data = UserData::create($input);
    
    return response()->json('ok', $this->okStatus); 
  }

  public function logout (Request $request) {
    User::find($request->user()->id)->update([
      'api_token' => null
    ]);

    $token = $request->user()->token();
    $token->revoke();

    return response()->json('aaa');
  }
}
