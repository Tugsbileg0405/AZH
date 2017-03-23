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
                      <form method="POST" id="myform" action="{{ url('/admin/history/edit',$history->id) }}">
                                   <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Гарчиг:</label>
                                                <input type="text" value="{{$history->title}}" required class="form-control border-input" name='title' placeholder="Гарчиг">
                                            </div>
                                        </div>
                                    </div>

                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Тайлбар</label>
                                                <textarea class="form-control" name='description' required  placeholder="Тайлбар" rows="3">{{$history->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Огноо:</label>
                                                <input type="date" value="{{$history->date}}"value="{{$history->images}}" required class="form-control" name="date">
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Ковер зураг</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info btn-fill ">
                                                                <i class="fa fa-picture-o"></i> Сонгох
                                                                </a>
                                                            </span>
                                                    <input id="thumbnail" value="{{$history->images}}" class="form-control border-input" type="text" name="filepath">
                                                </div>
                                                <img id="holder" style="margin-top:15px;max-height:100px;">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Нэмэх</button>
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
	</script>
@endpush