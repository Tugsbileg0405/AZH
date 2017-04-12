@extends('layouts.app')

@section('content')
 <div class="section section-about">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <ul class="nav nav-text nav-about" id="myTab" role="tablist">
                                <li class="nav-item @If($tabname == '#home') active @endif">
                                    <a class="nav-link" data-toggle="tab" href="#home" role="tab" aria-controls="home">Танилцуулга</a>
                                </li>
                                <li class="nav-item @If($tabname == '#history') active @endif">
                                    <a class="nav-link" data-toggle="tab" href="#history" role="tab" aria-controls="profile">Түүх</a>
                                </li>
                                <li class="nav-item @If($tabname == '#rule') active @endif">
                                    <a class="nav-link" data-toggle="tab" href="#rule" role="tab" aria-controls="messages">Дүрэм</a>
                                </li>
                                <li class="nav-item @If($tabname == '#structure') active @endif">
                                    <a class="nav-link" data-toggle="tab" href="#structure" role="tab" aria-controls="settings">Бүтэц</a>
                                </li>
                                <li class="nav-item @If($tabname == '#location') active @endif">
                                    <a class="nav-link" data-toggle="tab" href="#location" role="tab" aria-controls="settings">Салбарууд</a>
                                </li>
                            </ul>
                            <div class="tab-content about-content">
                                <div class="tab-pane @If($tabname == '#home') active @endif" id="home" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12">
                                                @if(!$intro->isEmpty())
                                                {!! $intro[0]->description !!}
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane @If($tabname == '#history') active @endif" id="history" role="tabpanel">
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
                                <div class="tab-pane @If($tabname == '#rule') active @endif" id="rule" role="tabpanel">
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
                                        @if(!$rule->isEmpty())
                                        @if(!$rule[0]->filename)
                                        <button class="btn btn-download">
                                        <a href="{{url('fileentry/get',$rule[0]->file)}}">
                                            <i class="fa fa-download"></i>
                                            ТАТАЖ АВАХ
                                         </a>
                                        </button>
                                        @endif
                                        @endif
                                        <button class="btn btn-print" onclick="printDiv('rule')">
                                            <a>
                                            <i class="fa fa-print"></i> ХЭВЛЭХ
                                            </a>
                                        </button>
                                    </div>
                                    <div class="rules">
                                        @if(!$rule->isEmpty())
                                           {!! $rule[0]->description !!}
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane @If($tabname == '#structure') active @endif" id="structure" role="tabpanel">
                                     <div class="row">
                                        <div class="col-md-12">
                                                @if(!$structure->isEmpty())
                                                  {!! $structure[0]->description !!}
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane @If($tabname == '#location') active @endif" id="location" role="tabpanel">
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
                        @foreach($latestnews as $news)
                        <div class="card card-blog card-plain">
                            <a href="{{ url('news',$news->id) }}" class="header">
                                <h6 class="card-date">{{$news->created_at->format('Y оны m сарын d өдөр')}}</h6>
                                <img src="{{asset($news->image)}}" class="image-header">
                            </a>
                            <div class="content">
                                <a href="{{ url('news',$news->id) }}" class="card-title">
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
    </div>
<input type="text" hidden id="number" value="{{$histories->count()}}">
@endsection


@push('script')
    <script>
        $( document ).ready(function() {
            var tabname = '{{$tabname}}';
            if(tabname == '#location'){
                $($('#aimag').children()[1]).prop('selected', 'selected').change();
            }
        });


        $('#myTab a').click(function (e) {
            if($(this).attr('href') == '#location'){
                 $($('#aimag').children()[1]).prop('selected', 'selected').change();
            }
            else{
                var data = JSON.parse({!! json_encode($lastnews) !!});
                $('.news-card').empty();
                data.forEach(function(news){
                    var dateString = news.created_at;
                    var date = new Date(dateString.replace(/-/g, '/'));
                    var month;
                    var day;
                    if((date.getMonth()+1)>9){
                        month = (date.getMonth()+1);
                    }else{
                        month = '0'+ (date.getMonth()+1);
                    }
                    if(date.getDate() > 9){
                        day = date.getDate();
                    }else{
                        day = '0' + date.getDate();
                    }
                   $( ".news-card" ).append( '<div class="card card-blog card-plain">\
                        <a href="{{ url("news") }}/'+news.id+'" class="header">\
                            <h6 class="card-date">'+  date.getFullYear() + ' оны '  + month + ' сарын ' + day + ' өдөр' +'</h6>\
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
            }
            var s= $(this).attr('href');
            s = s.substring(1);
            $.ajax({
                type: 'GET',
                url: '{{ url("about") }}',
                data: {
                    'name': s
                },
            }).done(function(data) {

            }).fail(function() {
               
            });
            e.preventDefault()
            $(this).tab('show')
        })

        function printDiv(divName) {
             var printContents = document.getElementById(divName).innerHTML;
             printContents = '<div style="text-align:center"><h2>' + $('.rule-header').html()+'</h2>' + '<p>' + $('.rule-description').html() + '</p></div>' + $('.rules').html();
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
                    var dateString = news.created_at;
                    var date = new Date(dateString.replace(/-/g, '/'));
                    var month;
                    var day;
                    if((date.getMonth()+1)>9){
                        month = (date.getMonth()+1);
                    }else{
                        month = '0'+ (date.getMonth()+1);
                    }
                    if(date.getDate() > 9){
                        day = date.getDate();
                    }else{
                        day = '0' + date.getDate();
                    }

                   $( ".news-card" ).append( '<div class="card card-blog card-plain animated bounceInUp ">\
                        <a href="{{ url("news") }}/'+news.id+'" class="header">\
                            <h6 class="card-date">'+  date.getFullYear() + ' оны '  + month + ' сарын ' + day + ' өдөр' +'</h6>\
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
        

    </script>
@endpush
