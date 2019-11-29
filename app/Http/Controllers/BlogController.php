<?php


namespace App\Http\Controllers;


use App\Blog;
use http\Env\Request;

class BlogController extends Controller {
  public function index() {
    $blog = Blog::all()->limit(3);
    return view('blog', compact('blog'));
  }

  public function detail($slug) {
    $result = Blog::where('slug','=', $slug)->get();

    $blog = '';
    foreach ($result as $res ) {
      $res->content = htmlspecialchars_decode($res->content);
      $blog = $res;
    }

    return view('blog', compact('blog'));
  }
}