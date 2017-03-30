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
                      <form method="POST" id="myform" action="{{ url('/admin/faq/edit',$faq->id) }}">
                                   <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Асуулт:</label>
                                                <input type="text" value="{{$faq->question}}" class="form-control border-input" required name='question' placeholder="Асуулт">
                                            </div>
                                        </div>
                                    </div>


                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Хариулт</label>
                                                <textarea class="form-control" name='answer' required placeholder="Хариулт" rows="3">{{$faq->answer}}</textarea>
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