<?php


namespace App\Http\Controllers\portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends Controller
{
  use AuthenticatesUsers;

  protected $redirectTo = '/admin/dashboard';

  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function index(){
    return view('portal.login');
  }

  public function login(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required|string'
    ]);

    if (auth()->attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1])) {
      return redirect()->intended('/admin/dashboard');
    }
    return redirect()->back()->with(['login' => 'Password Invalid / Inactive Users']);
  }

//  public function logout(){
//    Session::flush();
//    return redirect('/admin/login');
//  }
//
//  public function register(Request $request){
//    return view('register');
//  }
//
//  public function registerPost(Request $request){
//    $this->validate($request, [
//      'name' => 'required|min:4',
//      'email' => 'required|min:4|email|unique:users',
//      'password' => 'required',
//      'confirmation' => 'required|same:password',
//    ]);
//
//    $data =  new ModelUser();
//    $data->name = $request->name;
//    $data->email = $request->email;
//    $data->password = bcrypt($request->password);
//    $data->save();
//    return redirect('login')->with('alert-success','Kamu berhasil Register');
//  }
}