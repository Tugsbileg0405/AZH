@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <div class="card">
                    <div class="header">
                        <h4 class="title">И-мэйл илгээх</h4>
                    </div>
                    <div class="content">
                        <form method="POST" id="myform" action="{{ url('/admin/sendmail') }}">
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
                                        <label>Контент</label>
                                        <textarea rows="5" class="form-control my-editor border-input" name="description" placeholder="Контентоо оруулна уу..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Илгээх</button>
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
                description: {
                     validators: {
                         notEmpty: {
                             message: '* Талбарын утгыг бөглөнө үү'
                         }
                     }
                 },
             }
         });
        
        $('#myform').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                $("body").loading();
            }
        })

    	$(document).ready(function(){
            @if (session('mailstatus'))
            $("body").loading('stop');
        	$.notify({
            	icon: 'fa fa-check',
            	message: " {{ session('mailstatus') }}"

            },{
                type: 'success',
                timer: 1000
            });
           @endif
    	});
	</script>
@endpush