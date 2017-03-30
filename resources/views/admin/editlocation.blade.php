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
                       <form method="POST" id="myform" action="{{ url('/admin/location/edit',$Location->id) }}">
                                   <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Аймаг/Дүүрэг нэр:</label>
                                                  <select class="form-control" id="location" required name='name'>
                                                        <option value="">Аймаг/Дүүрэг нэр</option>
                                                        @foreach($provinces as $province)
                                                        <option value="{{ $province->id }}" {{ $Location->province_id == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>
                                                        @endforeach
                                                  </select>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label>Холбогдох хүний нэр:</label>
                                                <input type="text" required class="form-control border-input" name='cpersonname' value="{{$Location->c_person_name}}" placeholder="Холбогдох хүний нэр">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label>Холбогдох хүний дугаар:</label>
                                                <input type="text" required class="form-control border-input" name='cpersonphone' value="{{$Location->c_person_phone}}" placeholder="Холбогдох хүний дугаар">
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label>Холбогдох хүний и-мэйл:</label>
                                                <input type="email" class="form-control border-input" required name='cpersonemail' value="{{$Location->c_person_email}}" placeholder="Холбогдох хүний и-мэйл">
                                            </div>
                                        </div>
                                    </div>

                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label>Facebook хаяг:</label>
                                                <input type="text" class="form-control border-input"  name='cpersonfacebook' placeholder="Facebook хаяг" value="{{$Location->c_person_facebook}}">
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label>Нэмэлт мэдээлэл:</label>
                                                <textarea rows="5" class="form-control border-input"  name='information' placeholder="Нэмэлт мэдээлэл">{{$Location->information}}</textarea>
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
	</script>
@endpush