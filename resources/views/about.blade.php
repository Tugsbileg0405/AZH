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
                                    <p class="description">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                    <div class="panel-group timeline" id="experience">
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
                                                               <li class="col-xs-6 col-sm-4 col-md-4" data-src="{{ asset($history->images) }}" data-sub-html="<h4>{{$history->title}}</h4><p>{{$history->description}}</p>">
                                                                   <a href="">
                                                                       <img class="img-responsive" src="{{ asset($history->images) }}">
                                                                   </a>
                                                               </li>
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
                                        АРДЧИЛСАН ЗАЛУУЧУУДЫН ХОЛБООНЫ ҮНДСЭН ДҮРЭМ
                                    </h2>
                                    <h2 class="rule-description">/шинэчилсэн найруулга/</h2>
                                    <div class="btn-group">
                                        <button class="btn">
                                            <i class="fa fa-download"></i>
                                            ТАТАЖ АВАХ
                                        </button>
                                        <button class="btn" onclick="printDiv('rule')">
                                            <i class="fa fa-print"></i> ХЭВЛЭХ
                                        </button>
                                    </div>
                                    <h2 class="rule-subheader">
                                        НЭГ. НИЙТЛЭГ ҮНДЭСЛЭЛ
                                    </h2>

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>1.1</td>
                                                <td>Ардчилсан Залуучуудын Холбоо /цаашид “Холбоо” гэнэ/ нь Ардчилсан Намын үндсэн дүрмээр баталгаажсан, Ардчилсан Намын дэргэдэх албан ёсны залуучуудын байгууллага мөн.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1.2</td>
                                                <td> Холбооны төв байр Монгол Улсын нийслэл Улаанбаатар хотод байрлана.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1.3</td>
                                                <td>Холбоо байгуулагдсан : 2000 оны 12-р сарын 07-ны өдөр
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1.4</td>
                                                <td>Холбоо нь Үндэсний чуулганаар баталсан туг, бэлгэдэл, тэмдэг, уриатай байх ба дуулалтай байж болно.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1.5</td>
                                                <td>Эрхэм зорилго : Ардчилсан залуучууд бид-Монгол Улсын хөгжил дэвшилд өөрсдийн хувь нэмрийг оруулах, ардчилсан үзэл санаа, ардчиллын үнэт зүйлсийг түгээн дэлгэрүүлэх, нээлттэй нийгмийг төлөвшүүлэх, залуучуудын
                                                    улс төрийн боловсролыг дээшлүүлэх, төр болон нутгийн өөрөө удирдах ёсны байгууллагуудад залуучуудын төлөөллийг нэмэгдүүлэх, төрөөс залуучуудын талаар явуулж байгаа бодлого, гарах шийдвэрт нөлөөлөх, түүнийг
                                                    гардан хэрэгжүүлэхэд идэвхитэй оролцох, Ардчилсан намын бодлого, үзэл баримтлал, мөрийн хөтөлбөрийг хэрэгжүүлэх явдлыг эрхэм зорилгоо болгов.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1.6</td>
                                                <td>Холбооны бүх шатны байгууллага нэг загварын албан бичгийн хэвлэмэл хуудас, тэмдэгтэй байна.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1.7</td>
                                                <td>Ардчилсан Залуучуудын Холбооны англи хэл дээрх албан ёсны нэр нь “The Democratic Youth Union of Mongolia” гэж орчуулагдана.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h2 class="rule-subheader">
                                        ХОЁР. ГИШҮҮНИЙ ЭРХ, ҮҮРЭГ
                                    </h2>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>2.1</td>
                                                <td>Энэхүү дүрмийг хүлээн зөвшөөрч Холбоонд элсэх хүсэлтээ сайн дурын үндсэн дээр бичгээр илэрхийлсэн 36 хүртэл насны залуус гишүүнээр элсэж болно.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2.2</td>
                                                <td> Гишүүн нь Холбооны үйл ажиллагаанд идэвхитэй оролцож, Холбооны эрхэм зорилго, зорилгыг хэрэгжүүлэхэд өөрийн хувь нэмрийг оруулна.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2.3</td>
                                                <td>Гишүүн нь Холбооны дүрмийг хэрэгжүүлэхтэй холбогдсон үйл ажиллагаанд оролцохдоо Холбооны зүгээс дэмжлэг туслалцаа авах эрхтэй.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2.4</td>
                                                <td>Гишүүн нь Холбооны удирдлагыг сонгох,түүнд сонгогдох эрхтэй.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2.5</td>
                                                <td>Гишүүн нь Холбооны удирдлагад өөрийн санал хүсэлтийг гаргаж, шийдвэрлүүлэх эрхтэй.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2.6</td>
                                                <td>Холбооны гишүүнээс өөрийн хүсэлтээр гарах, эргэж орох асуудал нээлттэй. Энэ заалт насны хязгаарлалтаар гарсан тохиолдолд үл хамаарна.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2.7</td>
                                                <td>Холбооны гишүүн, сонгуульт гишүүн, ажилтны хууль бус үйл ажиллагааны улмаас иргэд, аж ахуйн нэгж, байгууллагад учирсан хохирол, түүнээс үүсэх хариуцлагыг Холбоо хүлээхгүй.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2.8</td>
                                                <td>Холбооны гишүүн тогтоосон хэмжээнд татвар төлөх үүрэгтэй.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                                <option value="{{ $sectionInfo->location_id }}">{{ $sectionInfo->sector->name }}</option>
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
                $('.location-content .rule-header').html(data.title);
                $('.location-content .description').html(data.description);
            });
            $.get("{{ url('sectornews') }}"+ "/" + $(this).val(), function( data ) {
                $('.news-card').empty();
                data.forEach(function(news){
                   $( ".news-card" ).append( '<div class="card card-blog card-plain animated bounceInUp ">\
                        <a href="{{ url("news") }}/'+news.id+'" class="header">\
                            <h6 class="card-date">'+ news.created_at +'</h6>\
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
