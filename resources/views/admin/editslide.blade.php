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
                                                 <label>Зураг:</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info btn-fill ">
                                                        <i class="fa fa-picture-o"></i> Сонгох
                                                        </a>
                                                    </span>
                                                    <input id="thumbnail"  value="{{$slide->image}}" class="form-control border-input"  type="text" name="filepath">
                                                </div>
                                                <img id="holder" style="margin-top:15px;max-height:100px;">
                                            </div>
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
      $('.buttonInfo').hide();
      if({{$slide->isButton}} == 1){
          $('.buttonInfo').show();
      }
      else {
          $('.buttonInfo').hide();
      }
             
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