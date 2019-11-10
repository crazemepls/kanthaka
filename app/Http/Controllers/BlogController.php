<?php


namespace App\Http\Controllers;


use App\Blog;

class BlogController extends Controller {
  public function index() {
    $blog = Blog::all();
    return view('blog', compact('blog'));
  }
}