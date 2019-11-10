<?php


namespace App\Http\Controllers\portal;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index(){
    if(!Session::get('login')){
      return redirect('/admin/login');
    }
    else{
      return view('portal/dashboard');
    }
  }
}