@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <div class="card">
                    <div class="header">
                        <h4 class="title">Мэдээ засах</h4>
                    </div>
                    <div class="content">
                         <form method="POST" id="myform" action="{{ url('/admin/programcomment/edit', $Programcomment->id ) }}">
                                   <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Гарчиг:</label>
                                                <input type="text" value="{{$Programcomment->title}}" required class="form-control border-input" name='title' placeholder="Гарчиг">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Дэд гарчиг</label>
                                                 <input type="text" value="{{$Programcomment->subtitle}}" required class="form-control border-input" name='subtitle' placeholder="Дэд гарчиг">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Сэтгэгдэл:</label>
                                                <textarea rows="5" required  class="form-control border-input" name="comment" placeholder="Сэтгэгдэл оруулна уу...">{{$Programcomment->description}}</textarea>
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
                                                        <img src="{{ asset($Programcomment->imageURL) }}">
                                                        <input type="hidden" name="photo" value="{{ $Programcomment->imageURL }}">
                                                        <i class="fa fa-close fa-4x" aria-hidden="true"></i>
                                                        <div class="wait">
                                                            <div class="loader"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="warning">* 600x600 хэмжээтэй зураг тохиромжтой.</p>
                                        </div>
                                    </div>

                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Хөтөлбөр ангилал:</label>
                                                <select class="form-control" required name="programname">
                                                    <option value="">Хөтөлбөр ангилал сонгоно уу</option>
                                                    @foreach($programNames as $programName)
                                                    <option value="{{ $programName->id }}" {{ $Programcomment->program_id == $programName->id ? 'selected' : '' }}>{{ $programName->name }}</option>
                                                    @endforeach
                                            </select>
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
        $('#lfm').filemanager('image');
    	$(document).ready(function(){
            
            $( "#myform" ).submit(function( event ) {
                $("body").loading();
            });

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
                    url: '{{ url("admin/storeaphoto/600/600") }}',
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