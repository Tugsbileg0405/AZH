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
                       <form method="POST" id="myform" action="{{ url('/admin/sectorinfo/edit',$sectorInfo->id) }}">
                                   <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Гарчиг:</label>
                                                <input type="text" value="{{$sectorInfo->title}}" required class="form-control border-input" name='title' placeholder="Гарчиг">
                                            </div>
                                        </div>
                                    </div>

 
                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Тайлбар:</label>
                                                <textarea class="form-control my-editor" name='description' required placeholder="Тайлбар" rows="3">{{$sectorInfo->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Салбарын байрлал:</label>
                                                <select class="form-control" required name="location">
                                                    <option value="">Cалбараас сонгоно уу</option>
                                                    @foreach($provinces as $province)
                                                    <option value="{{ $province->id }}" {{ $sectorInfo->location_id == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>
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

        $('#myform').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()) {
                    $("body").loading();
                }
        })

    	$(document).ready(function(){
            $("body").loading('stop');
            @if (session('status'))
        	$.notify({
            	icon: 'fa fa-check',
            	message: " {{ session('status') }}"

            },{
                type: 'success',
                timer: 2000
            });
           @endif
    	});
	</script>
@endpush