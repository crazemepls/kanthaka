<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index() {
    $blogs = Blog::all()->take(6);
    $banners = Banner::all()->take(5);
    return view('app', compact('blogs', 'banners'));
  }

  public function tentangPage() {
    return view('tentang');
  }

  public function programKerjaPage() {
    return view('program-kerja');
  }

}
