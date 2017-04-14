@extends('layouts.app')

@section('title', 'Ардчилсан Залуучуудын холбоо')
@section('description', '1206 онд Их Монгол улс байгуулагдсан түүхэн үйл явдлыг билэгдэн ардчиллын төлөөх улс төрийн намууд 2000 оны 12 дугаар сарын 06-ны өдөр Их Хурлаа хийж, Ардчилсан намыг байгуулсан билээ. Энэхүү нэгдэлд оролцогч улс төрийн намуудын дэргэдэх залуучуудын байгууллагууд эвсэн нэгдэж, 2000 оны 12 дугаар сарын 07-ны өдөр анхны Үндэсний чуулганаа хуралдуулж, Ардчилсан намын дэргэдэх албан ёсны залуучуудын байгууллага болох Ардчилсан Залуучуудын Холбоог үүсгэн байгуулсан юм.')
@section('image', asset("img/logo/facebooklogo.png"))

@section('content')
 <div class="section section-program">
        <div class="container">
            <div class="row">
                 <div class="section section-our-projects">
                         <div class="title-area">
                             <h2>{{$programName->name}}</h2>
                             <div class="separator separator-danger">♦</div>
                             <p class="description">
                                 {{$programName->description}}
                             </p>
                         </div>
                         @if($programName->programs)
                         <div class="container">
                             <div class="row">
                                 @foreach($programName->programs as $index => $program)
                                 <div class="col-md-6">
                                     <div class="project">
                                         <img src="{{ asset($program->image) }}">
                                         <a class="over-area" href="{{ url('program', $program->id) }}">
                                             <div class="content">
                                                 <h2>{{ $program->title }}</h2>
                                                 <p>{{ $program->short_description }}</p>
                                             </div>
                                         </a>
                                     </div>
                                 </div>
                                 @endforeach
                             </div>
                         </div>
                        @endif
                  </div>
            </div>
        </div>
    </div>

@endsection