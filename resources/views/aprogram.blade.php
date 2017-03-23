@extends('layouts.app')

@include('partials.navbarNoTrans')

 <div class="section section-program">
        <div class="container">
            <div class="row">
                <div class="section section-our-projects">
                     <div class="title-area">
                             <h2>{{ $program->title }}</h2>
                             <div class="separator separator-danger">♦</div>
                             
                     </div>
                      <div class="container">
                         <div class="row">
                             <div class="col-md-12">
                                 <img class="img-responsive" src="{{ asset($program->image) }}">
                                  <p class="description">
                                      {!! $program->description !!}
                                  </p>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('partials.footer')