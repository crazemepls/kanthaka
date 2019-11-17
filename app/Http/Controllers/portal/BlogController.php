<?php


namespace App\Http\Controllers\portal;


use App\Blog;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class BlogController extends Controller {
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index() {
    $data  = array(
      "page" => "blogs",
      "title" => "Blogs"
    );
    return view("portal/blog/list", compact('data'));
  }

  public function list(Request $request) {
    $data = DataTables::of(DB::table('blogs')
      ->orderByDesc('created_at'))
      ->make(true);
    return $data;
  }

  public function detail(Request $request) {
    $data  = array(
      "page" => "blogs",
      "title" => "Blogs"
    );

    $blogDetail = DB::table('blogs')
      ->where('id','=',$request->id)->first();

    $data['blogDetail'] = $blogDetail;

//    dd($data);
    return view('portal/blog/detail', compact('data'));
  }

  public function update(Request $request) {
    $rules = array(
      'title' => 'required|string',
      'blog_content' => 'required|string',
      'image_url' => 'required|string');

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return redirect('/admin/blog/detail'+$request->id)->withErrors($validator);
    }

    try {
      Blog::where('id','=',$request->input('id'))
        ->update(array(
          'title' => $request->input('title'),
          'thumbnail' => $request->input('image_url'),
          'slug' => Str::slug($request->input('title'),'-'),
          'content' => htmlspecialchars($request->input('blog_content'))
        ));

      $request->session()->flash('success', 'Blog has been updated successfully');

      return redirect('/admin/blog');
    }catch (QueryException $e){
      if ($e->errorInfo[1] == 1062) {
        return redirect('/admin/blog/create')->with('error', 'Please insert unique title !');
      }
      return redirect('/admin/blog/create')->with('error', $e->errorInfo[2]);
    }
  }

  public function create(Request $request) {
    $data  = array(
      "page" => "blogs",
      "title" => "Blogs"
    );
    return view('portal/blog/create', compact('data'));
  }

  public function createPost(Request $request) {
    $rules = array(
      'title' => 'required|string',
      'blog_content' => 'required|string',
      'image_url' => 'required|string');

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return redirect('/admin/blog/create')->withErrors($validator);
    }

    try {
      $blog = new Blog();
      $blog->title = $request->input('title');
      $blog->thumbnail = $request->input('image_url');
      $blog->slug = Str::slug($request->input('title'),'-');
      $blog->content = htmlspecialchars($request->input('blog_content'));
      $blog->save();

      $request->session()->flash('success', 'Blog has been added successfully');

      return redirect('/admin/blog');
    }catch (QueryException $e){
      if ($e->errorInfo[1] == 1062) {
        return redirect('/admin/blog/create')->with('error', 'Please insert unique title !');
      }
      return redirect('/admin/blog/create')->with('error', $e->errorInfo[2]);
    }
  }
}