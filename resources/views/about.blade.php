@extends('layouts.app')

@include('partials.navbarNoTrans')

 <div class="section section-about">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <ul class="nav nav-text nav-about" id="myTab" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link" data-toggle="tab" href="#home" role="tab" aria-controls="home">Танилцуулга</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#history" role="tab" aria-controls="profile">Түүх</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#rule" role="tab" aria-controls="messages">Дүрэм</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#structure" role="tab" aria-controls="settings">Бүтэц</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#location" role="tab" aria-controls="settings">Салбарууд</a>
                                </li>
                            </ul>

                            <div class="tab-content about-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12">
                                                @if(!$intro->isEmpty())
                                                {!! $intro[0]->description !!}
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="history" role="tabpanel">
                                    <div class="panel-group timeline" id="experience">
                                        @if(!$vow->isEmpty())
                                            {!! $vow[0]->description !!}
                                        @endif
                                        @if(!$histories->isEmpty())
                                        @foreach($histories as $index => $history)
                                        <div class="timeline-item">
                                            <div class="timeline-year">
                                                <h2 class="timeline-year">{{ $history->date }}</h2>
                                            </div>

                                            <div class="timeline-btn">
                                            </div>

                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        <a href="#exp{{$history->id}}" data-toggle="collapse" data-parent="#experience">
                                                            <h4>{{$history->title}}</h4>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div id="exp{{$history->id}}" class="panel-collapse collapse @if($index == 0) {{ 'in' }} @endif">
                                                    <div class="panel-body">
                                                        <div class="demo-gallery">
                                                            <ul id="lightgallery{{$index}}" class="list-unstyled row">
                                                                @if($history->images)
                                                                    @foreach(unserialize($history->images) as $image)
                                                                    <li class="col-xs-6 col-sm-4 col-md-4" data-src="{{ asset($image) }}" data-sub-html="<h4>{{$history->title}}</h4><p>{{$history->description}}</p>">
                                                                        <a href="">
                                                                            <img class="img-responsive" src="{{ asset($image) }}">
                                                                        </a>
                                                                    </li>
                                                                    @endforeach
                                                               @endif
                                                            </ul>
                                                        </div>
                                                        <p>
                                                           {{$history->description}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane" id="rule" role="tabpanel">
                                    <h2 class="rule-header">
                                        @if(!$rule->isEmpty())
                                        {{$rule[0]->title}}
                                        @endif
                                    </h2>
                                    <h2 class="rule-description">
                                        @if(!$rule->isEmpty())
                                            {{$rule[0]->subtitle}}
                                        @endif
                                    </h2>
                                    <div class="btn-group">
                                        <button class="btn">
                                            <i class="fa fa-download"></i>
                                            ТАТАЖ АВАХ
                                        </button>
                                        <button class="btn" onclick="printDiv('rule')">
                                            <i class="fa fa-print"></i> ХЭВЛЭХ
                                        </button>
                                    </div>
                                    <div class="rules">
                                        @if(!$rule->isEmpty())
                                           {!! $rule[0]->description !!}
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane" id="structure" role="tabpanel">
                                     <div class="row">
                                        <div class="col-md-12">
                                                @if(!$structure->isEmpty())
                                                  {!! $structure[0]->description !!}
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="location" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>
                                                Аймаг эсвэл дүүрэг сонгох:
                                            </p>
                                            <select class="form-control" id="aimag">
                                                <option value="">Cалбараас сонгоно уу</option>
                                                @foreach($sectionInfos as $sectionInfo)
                                                <option value="{{ $sectionInfo->location_id }}">{{ $sectionInfo->province->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="location-content">
                                        <h2 class="rule-header"></h2>
                                        <p class="description">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1 text-center">
                    <div class="title-area">
                        <h2 class="description">Мэдээ мэдээлэл</h2>
                    </div>
                    <div class="news-card">

                    </div>
                </div>
            </div>
        </div>
    </div>
<input type="text" hidden id="number" value="{{$histories->count()}}">
@include('partials.footer')

@push('script')
    <script>
        function printDiv(divName) {
             var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;
             document.body.innerHTML = printContents;
             window.print();
             document.body.innerHTML = originalContents;
       }
        var length = $('#number').val();
        var i = 0; 
        for(i; i< length;i++){
            var number = i;
           $('#lightgallery'+ number).lightGallery();
        }


         $('#aimag').change(function() {
             $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
             $.get("{{ url('sector') }}"+ "/" + $(this).val(), function( data ) {
                $('.location-content .rule-header').html(data[0].title);
                $('.location-content .description').html(data[0].description);
            });
            $.get("{{ url('sectornews') }}"+ "/" + $(this).val(), function( data ) {
                $('.news-card').empty();
                data.forEach(function(news){
                    var date = new Date(news.created_at);
                   $( ".news-card" ).append( '<div class="card card-blog card-plain animated bounceInUp ">\
                        <a href="{{ url("news") }}/'+news.id+'" class="header">\
                            <h6 class="card-date">'+  date.getFullYear() + ' оны '  + (date.getMonth() + 1) + ' сарын ' + date.getDate() + ' өдөр' +'</h6>\
                            <img src="{{ asset('') }}' + news.image +'" class="image-header">\
                        </a>\
                        <div class="content">\
                            <a href="{{ url("news") }}/'+news.id+'" class="card-title">\
                                <h3>'+news.title+'</h3>\
                            </a>\
                            <div class="line-divider line-danger"></div>\
                        </div>\
                    </div>' );
                })
            });
        });
        $($('#aimag').children()[1]).prop('selected', 'selected').change();

    </script>
@endpush
