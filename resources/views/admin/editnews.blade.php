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
                        <form method="POST" id="myform" action="{{ url('/admin/news/edit', $news->id) }}">
                            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Гарчиг</label>
                                        <input type="text" value="{{$news->title}}" class="form-control border-input" required name='title' placeholder="Гарчиг">
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
                                            <input id="thumbnail" value="{{$news->image}}" class="form-control border-input" type="text" name="filepath">
                                        </div>
                                        <img id="holder" style="margin-top:15px;max-height:100px;">
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Богино танилцуулга</label>
                                        <textarea rows="5" value="" class="form-control border-input" required name="shortdescription" placeholder="Богино танилцуулга оруулна уу...">{{$news->short_description}}</textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Контент</label>
                                        <textarea rows="5" class="form-control my-editor border-input"  required name="description" placeholder="Контентоо оруулна уу...">{{$news->content}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ангилал</label>
                                        <select class="form-control" required name="category"  style="border: 1px solid #CCC5B9">
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $news->news_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                                                    @foreach($locations as $location)
                                                    <option value="{{ $location->id }}" {{ $news->location_id == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
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