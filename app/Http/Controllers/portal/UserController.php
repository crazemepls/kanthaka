<?php


namespace App\Http\Controllers\portal;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  public function index(){
    if(!Session::get('login')){
      return redirect('/admin/login');
    }
    else{
      return view('portal/dashboard');
    }
  }

  public function login(){
    return view('portal/login');
  }

  public function loginPost(Request $request){
    $rules = array(
      'email' => 'required|string',
      'password' => 'required|string');
    $messages = array(
      'email.required' => 'Email harus diisi.',
      'password.required' => 'Password harus diisi');

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return redirect('/admin/login')->withErrors($validator);
  }

    $email = $request->input('email');
    $password = $request->input('password');

    $data = User::where('email',$email)
      ->where('is_admin',1)
      ->first();
    if($data){
      if(Hash::check($password,$data->password)){
        Session::put('name',$data->name);
        Session::put('email',$data->email);
        Session::put('login',TRUE);
        return redirect('/admin/dashboard');
      }
      else{
        return redirect('/admin/login')->withErrors(['login' => 'Email atau password salah']);
      }
    }
    else{
      return redirect('/admin/login')->with('alert','Wrong email or password!');
    }
  }

  public function logout(){
    Session::flush();
    return redirect('/admin/login');
  }

  public function register(Request $request){
    return view('register');
  }

  public function registerPost(Request $request){
    $this->validate($request, [
      'name' => 'required|min:4',
      'email' => 'required|min:4|email|unique:users',
      'password' => 'required',
      'confirmation' => 'required|same:password',
    ]);

    $data =  new ModelUser();
    $data->name = $request->name;
    $data->email = $request->email;
    $data->password = bcrypt($request->password);
    $data->save();
    return redirect('login')->with('alert-success','Kamu berhasil Register');
  }
}