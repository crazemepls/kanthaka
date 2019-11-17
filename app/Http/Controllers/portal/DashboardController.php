<?php


namespace App\Http\Controllers\portal;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use function Sodium\compare;

class DashboardController extends Controller
{
  public function index(){
    $data  = array(
      "page" => "dashboard",
      "title" => "Dashboard"
    );
    return view('portal/dashboard', compact('data'));

  }
}