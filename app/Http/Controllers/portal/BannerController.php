<?php


namespace App\Http\Controllers\portal;


use App\Banner;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class BannerController extends Controller {
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index() {
    $data  = array(
      "page" => "banners",
      "title" => "Banners"
    );
    return view("portal/banner/list", compact('data'));
  }

  public function list(Request $request) {
    $data = DataTables::of(DB::table('banners')
      ->orderByDesc('created_at'))
      ->make(true);
    return $data;
  }

  public function detail(Request $request) {
    $data  = array(
      "page" => "banners",
      "title" => "Banners"
    );

    $bannerDetail = DB::table('banners')
      ->where('id','=',$request->id)->first();

    $data['bannerDetail'] = $bannerDetail;

    return view('portal/banner/detail', compact('data'));
  }

  public function update(Request $request) {
    $rules = array(
      'title' => 'required|string',
      'banner_content' => 'required|string',
      'image_url' => 'required|string');

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return redirect('/admin/banner/detail'+$request->id)->withErrors($validator);
    }

    try {
      Banner::where('id','=',$request->input('id'))
        ->update(array(
          'title' => $request->input('title'),
          'thumbnail' => $request->input('image_url'),
          'slug' => Str::slug($request->input('title'),'-'),
          'content' => htmlspecialchars($request->input('banner_content'))
        ));

      $request->session()->flash('success', 'Banner has been updated successfully');

      return redirect('/admin/banner');
    }catch (QueryException $e){
      if ($e->errorInfo[1] == 1062) {
        return redirect('/admin/banner/create')->with('error', 'Please insert unique title !');
      }
      return redirect('/admin/banner/create')->with('error', $e->errorInfo[2]);
    }
  }

  public function create(Request $request) {
    $data  = array(
      "page" => "banners",
      "title" => "Banners"
    );
    return view('portal/banner/create', compact('data'));
  }

  public function createPost(Request $request) {
    $rules = array(
      'title' => 'required|string',
      'banner_content' => 'required|string',
      'image_url' => 'required|string');

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return redirect('/admin/banner/create')->withErrors($validator);
    }

    try {
      $banner = new Banner();
      $banner->title = $request->input('title');
      $banner->thumbnail = $request->input('image_url');
      $banner->slug = Str::slug($request->input('title'),'-');
      $banner->content = htmlspecialchars($request->input('banner_content'));
      $banner->save();

      $request->session()->flash('success', 'Banner has been added successfully');

      return redirect('/admin/banner');
    }catch (QueryException $e){
      if ($e->errorInfo[1] == 1062) {
        return redirect('/admin/banner/create')->with('error', 'Please insert unique title !');
      }
      return redirect('/admin/banner/create')->with('error', $e->errorInfo[2]);
    }
  }
}