@extends('layouts.app') 

@section('title', 'Ардчилсан Залуучуудын холбоо')
@section('description', '1206 онд Их Монгол улс байгуулагдсан түүхэн үйл явдлыг билэгдэн ардчиллын төлөөх улс төрийн намууд 2000 оны 12 дугаар сарын 06-ны өдөр Их Хурлаа хийж, Ардчилсан намыг байгуулсан билээ. Энэхүү нэгдэлд оролцогч улс төрийн намуудын дэргэдэх залуучуудын байгууллагууд эвсэн нэгдэж, 2000 оны 12 дугаар сарын 07-ны өдөр анхны Үндэсний чуулганаа хуралдуулж, Ардчилсан намын дэргэдэх албан ёсны залуучуудын байгууллага болох Ардчилсан Залуучуудын Холбоог үүсгэн байгуулсан юм.')
@section('image', asset("img/logo/facebooklogo.png"))

@section('content')
<div class="section section-header">
    <div class="parallax">
        <div id="headerCarousel" class="carousel slide" data-interval="false" data-ride="carousel">
            <div class="carousel-inner">
                @if(!$slides->isEmpty()) @foreach($slides as $index => $slide)
                <div class="@if($index == 0) {{ 'active' }} @endif item">
                    <div class="parallax ">
                        <div class="image" style="background-image: url('{{ asset($slide->image)}}')">
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
                            <h1>{{$sectors->value}}</h1>
                            <p class="description">{{$sectors->name}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-icon">
                            <h1>{{$members->value}}</h1>
                            <p class="description">{{$members->name}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-icon">
                            <h1>{{$projects->value}}</h1>
                            <p class="description">{{$projects->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@if(!$ProgramNames->isEmpty())
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
            @inject('programs','App\Program') @inject('comments','App\Programcomment') @foreach($ProgramNames as $index => $ProgramName)
            <div class="item @if($index == 0) {{ 'active' }} @endif">
                <div class="container carousel-contain">
                    <div class="absolute-class">
                        <img src="{{ asset('img/logo/rectangle-6.png') }}" class="section-news-img">
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <a href="{{ url('programs', $ProgramName->id) }}">
                                        <p class="slider-title">{{$ProgramName->name}}</p>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <div class="row subprogram">
                                        @foreach($programs->where('ProgramName_id',$ProgramName->id)->orderBy('created_at', 'desc')->take(3)->get() as $program)
                                        <a href="{{ url('program', $program->id) }}">
                                            <div class="col-xs-6 col-sm-4">
                                                <div class="card info-section filter filter-color-blue">
                                                    <img class="card-img" src="{{ asset($program->image) }}" alt="Card image">
                                                    <div class="content">
                                                        <p class="card-text">{{ $program->title }}</p>
                                                        <i class="fa fa-chevron-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="display: flex;flex-wrap: wrap">
                                @if(!$comments->where('program_id',$ProgramName->id)->orderBy('created_at', 'desc')->take(1)->get()->isEmpty())
                                <div class="col-md-8 col-sm-8 comments">
                                    <p class="slider-comment">Хөтөлбөрийн талаарх сэтгэгдлүүд</p>
                                </div>
                                <div class="col-md-8 col-sm-8 comments" id="comment">
                                    <div class="row">
                                        @foreach($comments->where('program_id',$ProgramName->id)->orderBy('created_at', 'desc')->take(1)->get() as $comment)
                                        <div class="col-md-12 col-sm-12">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="media-object" src="{{ asset($comment->imageURL) }}" alt="Media Object">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{ $comment->title }}</h4>
                                                    <p>{{ $comment->subtitle }}</p>
                                                    <span>{{ $comment->description }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-4 col-sm-4 seeProgram">
                                    <a href="{{ url('programs') }}">
                                        <button class="btn btn-showinfo">
                                                Хөтөлбөрүүдийг харах
                                                <i class="fa fa-chevron-right"></i>
                                        </button>
                                    </a>
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
@endif




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
                            <div class="col-xs-12  col-md-4 col-sm-4">
                                <div class="card">
                                    <a href="{{ url('news', $news->id) }}">
                                        <img class="card-img-top" src="{{ asset($news->image) }}">
                                        </a>
                                    <div class="card-block">
                                        <h4 class="card-title">{{ $news->created_at->format('Y оны m сарын d өдөр') }}</h4>
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
            @foreach($presidents as $index => $president)
            <li class="@if($loop->last) {{ 'active' }} @endif">
                <a href="#testimonial{{ $president->id}}" role="tab" data-toggle="tab">
                    <div class="image-clients">
                        <img alt="..." src="{{ asset($president->photo_URL) }}" />
                        <p class="pre-firstname">{{ $president->firstname }}</p>
                        <p class="pre-lastname">{{ $president->lastname }}</p>
                    </div>
                </a>
                <div class="president-timeline">
                    <span class="tl-round"></span>
                    <p>{{ $president->year }}</p>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="tab-content">
            @foreach($presidents as $index => $president)
            <div class="tab-pane @if($loop->last) {{ 'active' }} @endif" id="testimonial{{ $president->id}}">
                <p class="description ">
                    {!! $president->description !!}
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
                    <a href="http://www.demparty.mn/" target="_blank">
                        <img src="{{ asset('img/logo/dempartlogo.png') }}" class="img-responsive center-block">
                        <p class="dem-title">Ардчилсан нам</p>
                    </a>
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
                <a href="https://www.facebook.com/demyouth/" target="_blank">
                         <button class="btn-like ">
                            <i class="fa fa-thumbs-up "></i>
                            Like
                        </button>
                </a>
                <a href="https://twitter.com/demyouth" target="_blank">
                          <button class="btn-twitter ">
                            <i class="fa fa-twitter "></i>
                            Follow @TwitterDev
                        </button>
                </a>
            </div>
        </div>
    </div>
</div>

<input type="text" hidden id="number" value="{{$ProgramNames->count()}}"> 
@endsection

@push('script')
<script>
    $('#myCarousel').carousel({
        interval: 1000 * 30
    });

    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })

    @if(session('substatus'))
        $.notify({
            icon: 'fa fa-check',
            message: " {{ session('substatus') }}"

        }, {
                type: 'success',
                timer: 2000
            });
    @endif

</script>
@endpush