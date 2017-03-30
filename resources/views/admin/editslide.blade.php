@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <div class="card">
                    <div class="header">
                        <h4 class="title">Засах</h4>
                    </div>
                    <div class="content">
                      <form method="POST" id="myform" action="{{ url('/admin/slide/edit',$slide->id) }}">
                                   <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Гарчиг:</label>
                                                <input type="text" value="{{$slide->title}}" required class="form-control border-input" name='title' placeholder="Гарчиг">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Тайлбар:</label>
                                                <input type="text" value="{{$slide->description}}" class="form-control border-input" required name='description' placeholder="Тайлбар">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Зураг</label>
                                                <input type="file" name="file" style="display: none">
                                            </div>
                                            <div class="photos">
                                                <div class="browse">
                                                    <i class="fa fa-image fa-3x" aria-hidden="true"></i>
                                                    <div class="wait">
                                                        <div class="loader"></div>
                                                    </div>
                                                </div>
                                                <div class="result">
                                                    <div class="photo">
                                                        <img src="{{ asset($slide->image) }}">
                                                        <input type="hidden" name="photo" value="{{ $slide->image }}">
                                                        <i class="fa fa-close fa-4x" aria-hidden="true"></i>
                                                        <div class="wait">
                                                            <div class="loader"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="warning">* 1920x1080 хэмжээтэй зураг тохиромжтой.</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Товч гаргах эсэх:</label>
                                                 <label class="radio">
                                                     <input type="radio" {{ $slide->isButton == 1 ? 'checked' : '' }} class="isBtn" data-toggle="radio" name="isButton" value="1">
                                                     Тийм
                                                 </label>
                                                 <label class="radio">
                                                     <input type="radio" {{ $slide->isButton == 0 ? 'checked' : '' }}  class="isBtn" data-toggle="radio" name="isButton" value="0">
                                                     Үгүй
                                                 </label>
                                            </div>
                                        </div>
                                    </div>
                                       
                                    <div class="buttonInfo">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Товчны текст:</label>
                                                <input type="text" value="{{$slide->btnText}}" class="form-control border-input " name='btnText' placeholder="Товчны текст">
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Товчны линк:</label>
                                                <input type="text" value="{{$slide->btnLink}}" class="form-control border-input" name='btnLink' placeholder="Товчны линк">
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Засах</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
       
@endsection

@push('script')
	<script type="text/javascript">
      $('.buttonInfo').hide();
      if({{$slide->isButton}} == 1){
          $('.buttonInfo').show();
      }
      else {
          $('.buttonInfo').hide();
      }
        
      $( "#myform" ).submit(function( event ) {
           $("body").loading();
      });

        $('#lfm').filemanager('image');
    	$(document).ready(function(){
            @if (session('status'))
            $("body").loading('stop');
        	$.notify({
            	icon: 'fa fa-check',
            	message: " {{ session('status') }}"

            },{
                type: 'success',
                timer: 2000
            });
           @endif
    	});

             var photos = $('.photos');
            var result = $('.result');
            var browse = $('.browse');
            var input = $('input[name=file]');
            browse.click(function() {
                input.click();
            });
            input.change(function() {
                browse.find('.fa').hide();
                browse.find('.wait').show();
                $.ajax({
                    type: 'POST',
                    url: '{{ url("admin/storeaphoto/1920/1080") }}',
                    data: new FormData(input.closest('form')[0]),
                    contentType: false,
                    processData: false,
                }).done(function(data) {
                    input.val(null);
                    browse.find('.fa').show();
                    browse.find('.wait').hide();
                    result.html(data);
                }).fail(function() {
                    browse.find('.fa').show();
                    browse.find('.wait').hide();
                });
            });
            $(document).on('click', '.photo .fa', function() {
                var photo = $(this).closest('.photo');
                var path = photo.find('input').val();
                photo.find('.fa').hide();
                photo.find('.wait').show();
                photo.remove();
            });
	</script>
@endpush