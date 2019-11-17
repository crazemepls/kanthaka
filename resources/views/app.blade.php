@extends('layout.main')
@section('title','Vidyasena Vihara Vidyaloka')
@section('content')
    <div class="site-blocks-cover" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12 mt-5 mt-md-0 mt-xl-0" style="position: relative;" data-aos="fade-up">
                    <div class="row align-items-center text-center text-md-left cover-content">
                        <div class="col-md-6 col-lg-5 mb-5 mb-md-0">
                            <h1 class="mb-5">Ayo Belajar Dhamma Bersama!</h1>
                            <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam assumenda ea quo cupiditate facere deleniti fuga officia.</p>
                        </div>
                        <div class="col-md-6 col-lg-7 col-xl-6 offset-xl-1">
                            <img src={{asset("images/meditation.svg")}} alt="Image" class="img-fluid" style="width: 90%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light" id="tentang-kami">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6">
                    <img src={{asset("images/tentang.webp")}} alt="Image" class="img-fluid mb-5 mb-lg-0 rounded shadow">
                </div>
                <div class="col-lg-5 ml-auto pl-lg-5">
                    <h2 class="text-black mb-4">Selamat datang kawan !</h2>
                    <p class="mb-4">Dalam bahasa sansekerta, "Vidya" berarti Pengetahuan dan "Sena" berarti prajurit
                        sehingga vidyasena berarti "Prajurit Pengetahuan". Sejak tahun 1986, Vidyasena telah aktif mengembangkan dhamma di Yogyakarta dan Indonesia.
                    </p>
                    <p><a href= {{ url("tentang-kami") }} class="btn btn-primary">Baca Selengkapnya</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="event-slider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src={{asset("images/banner.webp")}}>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src={{asset("images/banner.webp")}}>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src={{asset("images/banner.webp")}}>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#event-slider" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#event-slider" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light" id="program-kerja-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title mb-3">Program Kerja</h2>
                </div>
            </div>
            <div class="row align-items-stretch">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">

                    <div class="unit-4 d-block">
                        <div class="unit-4-icon mb-3">
                            <span class="icon-wrap"><span class="fas fa-dharmachakra"></span></span>
                        </div>
                        <div>
                            <h3>Dhammaduta</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                            <p><a href="#">Baca selengkapnya</a></p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">

                    <div class="unit-4 d-block">
                        <div class="unit-4-icon mb-3">
                            <span class="icon-wrap"><span class="text-primary icon-sentiment_satisfied"></span></span>
                        </div>
                        <div>
                            <h3>Dana Anak Asuh</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                            <p><a href="#">Baca selengkapnya</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" >
                    <div class="unit-4 d-block">
                        <div class="unit-4-icon mb-3">
                            <span class="icon-wrap"><span class="text-primary fas fa-tint"></span></span>
                        </div>
                        <div>
                            <h3>Donor Darah</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                            <p><a href="#">Baca selengkapnya</a></p>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                    <div class="unit-4 d-block">
                        <div class="unit-4-icon mb-3">
                            <span class="icon-wrap"><span class="text-primary fas fa-book"></span></span>
                        </div>
                        <div>
                            <h3>Free Book</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                            <p><a href="#">Baca selengkapnya</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                    <div class="unit-4 d-block">
                        <div class="unit-4-icon mb-3">
                            <span class="icon-wrap"><span class="text-primary fas fa-praying-hands"></span></span>
                        </div>
                        <div>
                            <h3>Dhamma Talk</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                            <p><a href="#">Baca selengkapnya</a></p>
                        </div>
                    </div>


                </div>

                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                    <div class="unit-4 d-block">
                        <div class="unit-4-icon mb-3">
                            <span class="icon-wrap"><span class="text-primary icon-power"></span></span>
                        </div>
                        <div>
                            <h3>Donor Darah</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                            <p><a href="#">Baca selengkapnya</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section" id="blog-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title mb-3">Blog</h2>
                </div>
            </div>

            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                        <div class="h-entry">
                            <img src={{$blog->thumbnail}} alt="thumbnail" class="img-fluid">
                            <h2><a href="#">{{$blog->title}}</a></h2>
                            <div class="meta mb-4">Ham Brook <span class="mx-2">&bullet;</span>{{$blog->created_at}}<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
                            <p>{{$blog->content}}</p>
                            <p><a href="/blog/{{$blog->slug}}">Continue Reading...</a></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title mb-3">Get In Touch</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7 mb-5">
                    <form action="#" class="p-5 bg-white">
                        <h2 class="h4 text-black mb-5">Contact Form</h2>
                        <div class="row form-group">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="text-black" for="fname">First Name</label>
                                <input type="text" id="fname" class="form-control rounded-0">
                            </div>
                            <div class="col-md-6">
                                <label class="text-black" for="lname">Last Name</label>
                                <input type="text" id="lname" class="form-control rounded-0">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label>
                                <input type="email" id="email" class="form-control rounded-0">
                            </div>
                        </div>
                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="subject">Subject</label>
                                <input type="subject" id="subject" class="form-control rounded-0">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="7" class="form-control rounded-0" placeholder="Write your notes or questions here..."></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Send Message" class="btn btn-primary mr-2 mb-2">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection