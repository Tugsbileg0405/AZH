@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <div class="card">
                    <div class="header">
                        <h4 class="title">Мэдээ оруулах</h4>
                    </div>
                    <div class="content">
                        <form method="POST" id="myform" action="{{ url('/admin/addnews') }}">
                            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Гарчиг</label>
                                        <input type="text" class="form-control border-input" required name='title' placeholder="Гарчиг">
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
                                         <div class="result"></div>
                                     </div>
                                 </div>
                             </div>

                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Богино танилцуулга</label>
                                        <textarea rows="5" class="form-control border-input" required name="shortdescription" placeholder="Богино танилцуулга оруулна уу..."></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Контент</label>
                                        <textarea rows="5" class="form-control my-editor border-input" required name="description" placeholder="Контентоо оруулна уу..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ангилал</label>
                                        <select class="form-control" required name="category" style="border: 1px solid #CCC5B9">
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Салбар</label>
                                        <select class="form-control" required name="location" style="border: 1px solid #CCC5B9">
                                                    @foreach($provinces as $province)
                                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                    @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Мэдээ оруулах</button>
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
         $('#myform').bootstrapValidator({
             fields: {
                 title: {
                     validators: {
                         notEmpty: {
                             message: '* Талбарын утгыг бөглөнө үү'
                         }
                     }
                 },
                   shortdescription: {
                     validators: {
                         notEmpty: {
                             message: '* Талбарын утгыг бөглөнө үү'
                         }
                     }
                 },
                   description: {
                     validators: {
                         notEmpty: {
                             message: '* Талбарын утгыг бөглөнө үү'
                         }
                     }
                 },
                   category: {
                     validators: {
                         notEmpty: {
                             message: '* Талбарын утгыг бөглөнө үү'
                         }
                     }
                 },    
                location: {
                     validators: {
                         notEmpty: {
                             message: '* Талбарын утгыг бөглөнө үү'
                         }
                     }
                 },
             }
         });
    	$(document).ready(function(){
            @if (session('status'))
        	$.notify({
            	icon: 'ti-check',
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
                url: '{{ url("admin/storephoto") }}',
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
            $.ajax({
                type: 'POST',
                url: '{{ url("admin/deletephoto") }}',
                data: {
                    'path': path,
                    '_token': '{{ csrf_token() }}'
                },
            }).done(function(data) {
                photo.remove();
            }).fail(function() {
                photo.find('.fa').show();
                photo.find('.wait').hide();
            });
        });
	</script>
@endpush