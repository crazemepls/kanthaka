@extends('layout.main')
@section('title', $blog->title)
@section('content')
  <div class="site-section">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="row mt-5">
          <div class="col-12 text-center">
            <h4 class="mb-1 px-2 section-title">Blog</h4>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-9">
            <img class="img-fluid mx-auto d-block mb-5 mx-4 mx-md-0 mx-lg-0" src={{ $blog->thumbnail }} />
          </div>
          <div class="col-md-9 mx-4 mx-md-0 mx-lg-0">
            {!! $blog->content !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
