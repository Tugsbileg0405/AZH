@extends('layouts.app')

@include('partials.navbarNoTrans')

 <div class="section section-newspage">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            @if($allnews->isEmpty())
                                <div class="content">
                                <p class="text-gray">Мэдээлэл байхгүй байна.</p>
                                </div>
                            @else
                            @foreach($allnews as $news)
                            <div class="card card-blog card-plain card-allnews">
                                <h6 class="card-date">{{ $news->created_at->format('Y оны m сарын d өдөр')  }}</h6>
                                <a class="header" href="{{ url('news', $news->id) }}">
                                    <img src="{{ asset($news->image) }}" class="image-header">
                                </a>
                                <div class="content">
                                    <a class="card-title" href="{{ url('news', $news->id) }}">
                                        <h3>{{$news->title}}</h3>
                                    </a>
                                    <p class="text-gray">{!! $news->short_description !!}</p>
                                </div>
                                <a class="btn btn-gray" href="{{ url('news', $news->id) }}">Дэлгэрэнгүй унших
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                            @endforeach
                            <nav>
                                <div class="text-center">
                                    {{ $allnews->links() }}
                                </div>
                            </nav>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1 text-center">
                     @if(!$categories->isEmpty())
                    <div class="title-area">
                        <h2 class="description">Ангилал</h2>
                    </div>
                    <div class="list-group" id="newsSidebar">
                        @foreach($categories as $category)
                        <a href="{{ url('category', $category->id) }}" class="list-group-item {{ Request::is('category', $category->id) ? 'active' : '' }}">
                            {{ $category->name }}
                        </a>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@include('partials.footer')