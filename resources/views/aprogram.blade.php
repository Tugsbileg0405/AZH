@extends('layouts.app') 

@section('content')
<div class="section section-aprogram">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                         <div class="section-white">
                            <div class="title">
                                <h2>{{ $program->title }}</h2>
                                <div class="separator separator-danger">♦</div>
                            </div>
                            <img class="img-responsive" src="{{ asset($program->image) }}">
                            <div class="description">
                            {!! $program->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @inject('programs','App\Program')
            <div class="col-md-3 col-md-offset-1">
                <div class="title-area">
                    <h2 class="description">Холбоотой хөтөлбөрүүд</h2>
                </div>
                @foreach($programs->where('programName_id',$program->programName_id)->where('id', '!=', $program->id)->orderBy('created_at', 'desc')->take(3)->get() as $otherprogram)
                <div class="card card-blog card-plain card-side card-program">
                    <a href="{{ url('program', $otherprogram->id) }}" class="header">
                                <img src="{{ asset($otherprogram->image) }}" class="image-header">
                            </a>
                    <div class="content">
                        <a href="{{ url('program', $otherprogram->id) }}" class="card-title">
                            <h3>{{$otherprogram->title}}</h3>
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