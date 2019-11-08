<?php

namespace App\Http\Controllers;

use App\User;
use Flugg\Responder\Facades\Responder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

  public function __construct()
  {
//    $this->middleware('auth:api', ['except' => ['login','register']]);
  }

  public function register(Request $request) {
    $this->validate($request,[
      'name' => 'required|string',
      'email' => 'required|email',
      'password' => 'required|confirmed',
      'phone' => 'string',
      'address' => 'string',
    ]);

    try {
      $user = new User;
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $plainPassword = $request->input('password');
      $user->password = app('hash')->make($plainPassword);
      $user->address = $request->input('address');
      $user->phone = $request->input('phone');
      $user->save();

      return responder()->success();
    } catch (\Exception $e){
      $message = '';
      if ($e->getCode() == 23000) {
        $message = 'Email has been taken';
      }else {
        $message = $e->getMessage();
      }
      return Responder::error($e->getCode(), $message)->respond();
    }
  }

  public function login(Request $request)
  {
    //validate incoming request
    $this->validate($request, [
      'email' => 'required|string',
      'password' => 'required|string',
    ]);

    $credentials = $request->only(['email', 'password']);

    if (!$token = auth('api')->attempt($credentials)) {
      return Responder::error(401,'Unauthorized');
    }

    return $this->respondWithToken($token);
  }
}
