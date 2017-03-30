@extends('layouts.admin')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Бүтэц</h4>
                            </div>
                             <div class="content">
                                <form method="POST" id="myform" action="{{ url('/admin/rule') }}">
                                    <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Гарчиг</label>
                                                <input type="text" class="form-control border-input" required name="title" value="@if(!$rule->isEmpty()){{ $rule[0]->title }} @endif" placeholder="Гарчигаа оруулна уу...">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Нэмэлт тайлбар</label>
                                                <input type="text" class="form-control border-input" name="subtitle" value="@if(!$rule->isEmpty()){{ $rule[0]->subtitle }} @endif" placeholder="Нэмэлт тайлбар оруулна уу...">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Файл</label>
                                                <input type="file" class="form-control border-input" id="file" name="file" value="@if(!$rule->isEmpty()){{ $rule[0]->file }} @endif">
                                                <input type="hidden" name="filename" id="filename">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Контент</label>
                                                <textarea rows="15"  class="form-control my-editor border-input" name="description" placeholder="Контентоо оруулна уу...">@if(!$rule->isEmpty()){{$rule[0]->description}}@endif</textarea>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Оруулах</button>
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
    	$(document).ready(function(){
             $('#myform').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()) {
                    $("body").loading();
                }
            })
            @if (session('rulestatus'))
            $("body").loading('stop');
        	$.notify({
            	icon: 'fa fa-check',
            	message: " {{ session('rulestatus') }}"

            },{
                type: 'success',
                timer: 1000
            });
           @endif

            var input = $('input[name=file]');
         
            input.change(function() {
                $.ajax({
                    type: 'POST',
                    url: '{{ url("admin/fileentry/add") }}',
                    data: new FormData(input.closest('form')[0]),
                    contentType: false,
                    processData: false,
                }).done(function(data) {
                    $('#filename').val(data);
                }).fail(function() {
                });
            });
    	});
	</script>
@endpush