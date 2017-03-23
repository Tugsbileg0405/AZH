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
                          <form method="POST" id="myform" action="{{ url('/admin/program/edit',$Program->id) }}">
                                   <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Хөтөлбөрийн нэр:</label>
                                                <input type="text" required class="form-control border-input" value="{{$Program->title}}" name='title' placeholder="Хөтөлбөрийн нэр">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Богино танилцуулга</label>
                                                <textarea rows="5" required class="form-control border-input" name="shortdescription" placeholder="Богино танилцуулга оруулна уу...">{{$Program->short_description}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Хөтөлбөрийн тайлбар:</label>
                                                <textarea rows="5" required class="form-control my-editor border-input" name="description" placeholder="Контентоо оруулна уу...">{{$Program->description}}</textarea>
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
                                                    <input id="thumbnail" value="{{$Program->image}}" class="form-control border-input"  type="text" name="filepath">
                                                </div>
                                                <img id="holder" style="margin-top:15px;max-height:100px;">
                                            </div>
                                        </div>
                                    </div>  

                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Хөтөлбөр ангилал:</label>
                                                <select class="form-control" required name="programname">
                                                    <option value="">Хөтөлбөр ангилал сонгоно уу</option>
                                                    @foreach($programNames as $programName)
                                                    <option value="{{ $programName->id }}" {{ $Program->programName_id == $programName->id ? 'selected' : '' }}>{{ $programName->name }}</option>
                                                    @endforeach
                                            </select>
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