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
                                <form method="POST" action="{{ url('/admin/structure') }}">
                                    <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Контент</label>
                                                <textarea rows="15"  class="form-control my-editor border-input" name="description" placeholder="Контентоо оруулна уу...">
                                                </textarea>
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
            @if (session('structurestatus'))
        	$.notify({
            	icon: 'ti-check',
            	message: " {{ session('structurestatus') }}"

            },{
                type: 'success',
                timer: 1000
            });
           @endif
    	});
	</script>
@endpush