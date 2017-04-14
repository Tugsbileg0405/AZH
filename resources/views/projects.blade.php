@extends('layouts.app')

@section('title', 'Ардчилсан Залуучуудын холбоо')
@section('description', '1206 онд Их Монгол улс байгуулагдсан түүхэн үйл явдлыг билэгдэн ардчиллын төлөөх улс төрийн намууд 2000 оны 12 дугаар сарын 06-ны өдөр Их Хурлаа хийж, Ардчилсан намыг байгуулсан билээ. Энэхүү нэгдэлд оролцогч улс төрийн намуудын дэргэдэх залуучуудын байгууллагууд эвсэн нэгдэж, 2000 оны 12 дугаар сарын 07-ны өдөр анхны Үндэсний чуулганаа хуралдуулж, Ардчилсан намын дэргэдэх албан ёсны залуучуудын байгууллага болох Ардчилсан Залуучуудын Холбоог үүсгэн байгуулсан юм.')
@section('image', asset("img/logo/facebooklogo.png"))

@section('content')
 <div class="section section-newspage">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="card card-blog card-plain">
                                <h6 class="card-date">2017 оны 01 сарын 20 өдөр</h6>
                                <a class="header">
                                    <img src="{{ asset('img/header-1.jpeg') }}" class="image-header">
                                </a>
                                <div class="content">
                                    <a class="card-title">
                                        <h3>How to Make the Perfect Statues</h3>
                                    </a>
                                    <p class="text-gray">That dreams will actualize. Dreams will manifest. We still love Kanye We will find freedom in truth as opposed to ridicule. All respect prayers and love to Phife’s family Thank you for so much inspiration...</p>
                                </div>
                                <a class="btn btn-gray">Дэлгэрэнгүй унших
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                            <div class="card card-blog card-plain">
                                <h6 class="card-date">2017 оны 01 сарын 20 өдөр</h6>
                                <a class="header">
                                    <img src="{{ asset('img/header-1.jpeg') }}" class="image-header">
                                </a>
                                <div class="content">
                                    <a class="card-title">
                                        <h3>How to Make the Perfect Statues</h3>
                                    </a>
                                    <p class="text-gray">That dreams will actualize. Dreams will manifest. We still love Kanye We will find freedom in truth as opposed to ridicule. All respect prayers and love to Phife’s family Thank you for so much inspiration...</p>
                                </div>
                                <a class="btn btn-gray">Дэлгэрэнгүй унших
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                            <div class="card card-blog card-plain">
                                <h6 class="card-date">2017 оны 01 сарын 20 өдөр</h6>
                                <a class="header">
                                    <img src="{{ asset('img/header-1.jpeg') }}" class="image-header">
                                </a>
                                <div class="content">
                                    <a class="card-title">
                                        <h3>How to Make the Perfect Statues</h3>
                                    </a>
                                    <p class="text-gray">That dreams will actualize. Dreams will manifest. We still love Kanye We will find freedom in truth as opposed to ridicule. All respect prayers and love to Phife’s family Thank you for so much inspiration...</p>
                                </div>
                                <a class="btn btn-gray ">Дэлгэрэнгүй унших
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                            <nav>
                                <div class="text-center">
                                    <ul class="pagination ">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1 text-center">
                    <div class="title-area">
                        <h2 class="description">Ангилал</h2>
                    </div>
                    <div class="list-group" id="newsSidebar">
                        <a href="#" class="list-group-item active">
                          Онцлох мэдээ
                        </a>
                        <a href="#" class="list-group-item">Фото, видео мэдээ</a>
                        <a href="#" class="list-group-item">Архив</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection