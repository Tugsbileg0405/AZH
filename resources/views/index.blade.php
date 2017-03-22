@extends('layouts.app')

@include('partials.navbarHome')

<div class="section section-header">
    <div class="parallax">
        <div id="headerCarousel" class="carousel slide" data-interval="false" data-ride="carousel">
            <div class="carousel-inner">
                @if(!$slides->isEmpty()) @foreach($slides as $index => $slide)
                <div class="@if($index == 0) {{ 'active' }} @endif item">
                    <div class="parallax ">
                        <div class="image" style="background-image: url('{{ asset($slide->image) }}')">
                        </div>
                        <div class="container">
                            <div class="content">
                                <div class="title-area">
                                    <h2 class="title-modern">{{ $slide->title }}</h2>
                                    <p class="description">{{ $slide->description }}</p>
                                </div>
                                @if(!$slide->isButton == 0)
                                <div class="button-get-started">
                                    <a class="btn btn-white" href="{{ $slide->btnLink }}" target="_blank">
                                                {{ $slide->btnText }}
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach @endif
            </div>
            <div id="carousel-wrapper">
                <a class="left carousel-control" href="#headerCarousel" role="button" data-slide="prev">
                    <span class="fa fa-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#headerCarousel" role="button" data-slide="next">
                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<hr class="transition-timer-carousel-progress-bar" />
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-icon">
                            <h1>31</h1>
                            <p class="description">Салбар</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-icon">
                            <h1>5000+</h1>
                            <p class="description">Гишүүн</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-icon">
                            <h1>1200+</h1>
                            <p class="description">Хөтөлбөр</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section section-news">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <p class="slider-subtitle">ҮЙЛ АЖИЛЛАГААНЫ ЧИГЛЭЛҮҮД</p>
                            <ol class="carousel-indicators">
                                @foreach($ProgramNames as $index => $ProgramName)
                                <li data-target="#myCarousel" data-slide-to="{{ $index }}" class="@if($index == 0) {{ 'active' }} @endif"></li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-inner" role="listbox">
            @inject('programs','App\Program') 
            @foreach($ProgramNames as $index => $ProgramName)
            <div class="item @if($index == 0) {{ 'active' }} @endif">
                <div class="container carousel-contain">
                    <div class="absolute-class">
                         <img src="{{ asset('img/logo/rectangle-6.png') }}" class="section-news-img">
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <p class="slider-title">{{$ProgramName->name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <ul id="responsive{{$index}}">
                                        @foreach($programs->where('ProgramName_id',$ProgramName->id)->orderBy('created_at', 'desc')->get() as $program)
                                        <li>
                                            <div class="card info-section filter filter-color-blue">
                                                <img class="card-img" src="{{ asset('img/header-1.jpeg') }}" alt="Card image">
                                                <div class="content">
                                                    <p class="card-text">{{ $program->title }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <p class="slider-comment">Хөтөлбөрийн талаарх сэтгэгдлүүд</p>
                                </div>
                                <div class="col-md-12 col-sm-12" id="comment">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8" id="comments">
                                            <div class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object" src="{{ asset('img/faces/face_1.jpg') }}" alt="Media Object">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Media heading</h4>
                                                    <p>Text is here</p>
                                                    This is some sample text. This is some sample text. This is some sample text. This is some sample text. This is some sample text. This is some sample text. This is some sample text. This is some sample text.
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-showinfo">
                                                Хөтөлбөрүүдийг харах
                                                <i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="fa fa-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="fa fa-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>





<div class="section section-our-team-freebie">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="title-area">
                    <h2 class="description">Мэдээ мэдээлэл</h2>
                </div>
            </div>

            <div class="team">
                <div class="row">
                    <div class=" col-md-10 col-md-offset-1">
                        <div class="row">
                            @foreach($latestnews as $news)
                            <div class="col-xs-6  col-md-4 col-sm-4">
                                <div class="card">
                                    <a href="{{ url('news', $news->id) }}">
                                        <img class="card-img-top" src="{{ asset($news->image) }}">
                                        </a>
                                    <div class="card-block">
                                        <h4 class="card-title">{{ $news->created_at }}</h4>
                                        <p class="card-text">{{ $news->title}}</p>
                                    </div>
                                    <a href="{{ url('news', $news->id) }}">
                                        <button class="btn btn-simple">
                                            Дэлгэрэнгүй унших
                                            <i class="fa fa-chevron-right"></i>
                                       </button>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="title-area">
                    <a href="{{ url('news') }}">
                        <button class="btn btn-showmore">Мэдээллүүдийг харах<i class="fa fa-chevron-right"></i></button>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="section section-our-clients-freebie">
    <div class="container">
        <div class="title-area">
            <h2 class="description">Ерөнхийлөгчид</h2>
        </div>
        <ul class="nav nav-text" id="myTab" role="tablist">
            @foreach($presidents as $president)
            <li>
                <a href="#testimonial{{ $president->id}}" role="tab" data-toggle="tab">
                    <div class="image-clients">
                        <img alt="..." src="{{ asset($president->photo_URL) }}" />
                        <p class="pre-firstname">{{ $president->lastname }}</p>
                        <p class="pre-lastname">{{ $president->firstname }}</p>
                    </div>
                </a>
                <div class="president-timeline">
                    <span class="tl-round"></span>
                    <p>{{ $president->year }}</p>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="tab-content ">
            @foreach($presidents as $president)
            <div class="tab-pane" id="testimonial{{ $president->id}}">
                <p class="description ">
                    {{ $president->description }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="section footer-logo">
    <div class="container">
        <div class="row">
            <div class=" col-md-4 col-md-offset-4 ">
                <div class="text-xs-center text-lg-center">
                    <img src="{{ asset('img/logo/bitmap_2.png') }}" class="img-responsive center-block">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section ">
    <div class="container ">
        <div class="row ">
            <div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3 col-sm-offset-2">
                <button class="btn btn-follow ">
                        Биднийг дагаарай
                        <i class="fa fa-chevron-right "></i>
                    </button>
                <button class="btn-like ">
                        <i class="fa fa-thumbs-up "></i>
                        Like
                    </button>
                <button class="btn-twitter ">
                        <i class="fa fa-twitter "></i>
                        Follow @TwitterDev
                    </button>
            </div>
        </div>
    </div>
</div>

<input type="text" hidden id="number" value="{{$ProgramNames->count()}}">
@include('partials.footer')

@push('script')
    <script>
          $('#myCarousel').on('slide.bs.carousel', function (e) {
                var active = $(e.target).find('.carousel-inner > .item.active');
                var from = active.index()+1;
                var next = $(e.relatedTarget);
                var to = next.index();
                $('#responsive' + from ).lightSlider({
                            item: 3,
                            loop: false,
                            slideMove: 2,
                            easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
                            speed: 600,
                            responsive: [{
                                    breakpoint: 800,
                                    settings: {
                                        item: 3,
                                        slideMove: 1,
                                        slideMargin: 6,
                                    }
                                },
                                {
                                    breakpoint: 480,
                                    settings: {
                                        item: 2,
                                        slideMove: 1
                                    }
                                }
                            ]
                    });
            })
            
            var length = $('#number').val();
            var i = 0; 
            for(i; i< length;i++){
                $('#responsive' + i ).lightSlider({
                        item: 3,
                        loop: false,
                        slideMove: 2,
                        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
                        speed: 600,
                        responsive: [{
                                breakpoint: 800,
                                settings: {
                                    item: 3,
                                    slideMove: 1,
                                    slideMargin: 6,
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    item: 2,
                                    slideMove: 1
                                }
                            }
                        ]
                });
            }
         
    </script>
@endpush