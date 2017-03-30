@extends('layouts.app')

@include('partials.navbarNoTrans')


<div class="section section-newspage">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="card card-blog card-plain card-news card-anews">
                                <h6 class="card-date">{{ $news->created_at->format('Y оны m сарын d өдөр')  }}</h6>
                                 <a class="card-title">
                                        <h3>{{$news->title}}</h3>
                                 </a>
                                <a class="header">
                                    <img src="{{ asset($news->image) }}" class="image-header">
                                </a>
                                <div class="content">
                                    {!! $news->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <div class="title-area">
                        <h2 class="description">Мэдээ мэдээлэл</h2>
                    </div>
                    @foreach($latestnews as $news)
                     <div class="card card-blog card-plain card-side card-side">
                         <a href="{{ url('news', $news->id) }}" class="header">
                             <h6 class="card-date">{{ $news->created_at->format('Y оны m сарын d өдөр')  }}</h6>
                             <img src="{{ asset($news->image) }}" class="image-header">
                         </a>
                         <div class="content">
                             <a href="{{ url('news', $news->id) }}" class="card-title">
                                 <h3>{{$news->title}}</h3>
                             </a>
                             <div class="line-divider line-danger"></div>
                         </div>
                     </div>
                     @endforeach
                </div>
            </div>
        </div>
    </div>

@include('partials.footer')