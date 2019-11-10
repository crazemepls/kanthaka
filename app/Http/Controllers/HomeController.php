<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index() {
    $blogs = Blog::all();
    return view('app', compact('blogs'));
  }

  public function tentangPage() {
    return view('tentang');
  }

  public function programKerjaPage() {
    return view('program-kerja');
  }

}
