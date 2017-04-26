@extends('layouts.app') 

@section('title', $program->title)
@section('image', asset($program->image))

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
                             <div class="social-share" id="sharePopup">
                                    
                             </div>
                            <h3>Сэтгэгдлүүд</h3>
                            <div class="media-area" id="programcomment">
                                    @foreach($program->comments()->orderBy('created_at', 'desc')->get() as $comment)
                                    <div class="media">
                                        <a href="#" class="avatar avatar-blue pull-left">
                                            <img class="media-object" src="{{ asset('img/userdefault.png')}}">
                                        </a>
                                        <div class="media-body">
                                            <h3 class="media-heading">
                                                @If($comment->user)
                                                    {{ $comment->users->name }}
                                                @else
                                                    {{ $comment->name }}
                                                @endif
                                            </h3>
                                            <h5 class="text-muted pull-right">{{ $comment->created_at->format('Y/m/d H:i') }}</h5>
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                            <div class="contact-form">
                                <form method="POST" id="commentForm" action="{{ url('/program/comment', $program->id) }}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input name="name" class="form-control" id="name" placeholder="Нэрээ оруулна уу..." required/>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="comment" required class="form-control" id="message" placeholder="Та өөрийн сэтгэгдлээ үлдээнэ үү..." rows="8"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-dark pull-right sendButton">
                                        Сэтгэгдэл үлдээх
                                        <i class="fa fa-paper-plane"></i>
                                    </button>
                                </form>
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

@push('script')
    <script>

      $("#sharePopup").jsSocials({
            url: "{{ Request::url()}}",
            text: "{{$program->title}}",
            shareIn: "popup",
            showLabel: true,
            shares: ["twitter", {share: "facebook", label: "Share",logo: "fa fa-facebook"}, "googleplus"]
      });

       $('.sendButton').attr('disabled',true);
        $('#message').keyup(function(){
            if($(this).val().length !=0)
                $('.sendButton').attr('disabled', false);            
            else
                $('.sendButton').attr('disabled',true);
        })


      $('#commentForm').submit(function(e) {
        $(this).find('button').attr('disabled',true);
		e.preventDefault();
		$.ajax({
			method: $(this).attr('method'),
			url: $(this).attr('action'),
			data: $(this).serialize(),
			context: this,
		}).done(function(data) {
			$('#programcomment').prepend(data);
			$(this).find('button').attr('disabled',false);
			$(this).trigger('reset');
			$(window).scrollTop($('#programcomment').offset().top - 150);
		}).fail(function() {
			$(this).find('button').attr('disabled',false);
		});
	});

    </script>
@endpush