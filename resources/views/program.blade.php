@extends('layouts.app')

@include('partials.navbarNoTrans')

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
                                 @foreach($programName->programs as $program)
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

@include('partials.footer')