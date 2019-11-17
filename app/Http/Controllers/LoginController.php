<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

  public function __construct()
  {
    $this->middleware('guest')->except('logout');
    $this->middleware('guest:user')->except('logout');
    $this->middleware('guest:admin')->except('logout');
  }

  public function getLogin()
  {
    return view('portal.login');
  }
  public function postLogin(Request $request)
  {
    // Validate the form data
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required'
    ]);
    // Attempt to log the user in
    // Passwordnya pake bcrypt
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
      // if successful, then redirect to their intended location
      Session::put('name',$request->name);
      Session::put('email',$request->email);
      return redirect()->intended('/admin');
    }

    if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
      Session::put('name',$request->name);
      Session::put('email',$request->email);
      return redirect()->intended('/user');
    }
    return redirect()->back()->with(['login' => 'Password Invalid / Inactive Users']);
  }
  public function logout()
  {
    if (Auth::guard('admin')->check()) {
      Auth::guard('admin')->logout();
    }

    if (Auth::guard('user')->check()) {
      Auth::guard('user')->logout();
    }
    Session::flush();

    return redirect('/');
  }
}