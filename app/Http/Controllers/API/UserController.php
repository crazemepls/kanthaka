<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:api', ['except' => ['login']]);
  }

  public function profile()
  {
    return responder()->success(['user' => Auth::user()]);
  }

  public function allUsers()
  {
    return responder()->success(['user' => User::all()]);
  }

  public function singleUser($id)
  {
    try {
      $user = User::whereUuid($id)->first();
      return responder()->success(['user' => $user]);

    } catch (\Exception $e) {
      return responder()->error()->respond(404, ['message' => 'user not found!']);
    }

  }
}
