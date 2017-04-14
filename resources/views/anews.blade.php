@extends('layouts.app')

@section('title', $news->title)
@section('description', $news->short_description)
@section('image', asset($news->image))


@section('content')
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
                                <div class="social-share" id="sharePopup">
                                    
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

@endsection

@push('script')
    <script>
      $('.content').find('iframe').addClass('embed-responsive-item').wrap( "<div class='embed-responsive embed-responsive-16by9'></div>" );
      $("#sharePopup").jsSocials({
            url: "{{ Request::url()}}",
            text: "{{$news->title}}",
            shareIn: "popup",
            showLabel: true,
            shares: ["twitter", {share: "facebook", label: "Share",logo: "fa fa-facebook"}, "googleplus"]
      });
    </script>
@endpush
