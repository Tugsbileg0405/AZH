@extends('layouts.admin')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row admin-header">
                                <div class="col-xs-6">
                                    <div class="header">
                                        <h4 class="title">Мэдээний ангилал</h4>
                                    </div>
                                </div>
                                <div class="col-xs-6" >
                                    <div class="pull-right">
                                        <button class="btn btn-info btn-fill btn-icon btn-lg" data-toggle="modal" data-target="#myModal">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                         <div class="card">
                                <div class="content">
                                    <div class="toolbar">
                                    </div>
                                    <div class="fresh-datatables">
                                        <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="categorytable" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th>ID</th>
                                                                <th>Нэр</th>
                                                                <th>Үүсгэсэн огноо</th>
                                                                <th>Засварлах/Устгах</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Нэр</th>
                                                                <th>Үүсгэсэн огноо</th>
                                                                <th>Засварлах/Устгах</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>


         <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Мэдээний ангилал нэмэх</h4>
                    </div>
                    <div class="modal-body">
                         <form method="POST" id="myform" action="{{ url('/admin/category') }}">
                                   <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Ангилалын нэр:</label>
                                                <input type="text" class="form-control border-input" required name='name' placeholder="Ангилалын нэр...">
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
@endsection

@push('script')
   <script type="text/javascript">
             $('#myform').bootstrapValidator({
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: '* Талбарын утгыг бөглөнө үү'
                            }
                        }
                    }
                }
            });


                 var table = $('#categorytable').DataTable({
                    processing: true,
                    serverSide: true,
                    iDisplayLength: 5,
                    dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    pagingType: "full_numbers",
                    ajax: '{!! route('datatables.getallcat') !!}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'created_at', name: 'created_at' },
                         {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });

                  function deleteCat(id){
                        swal({
                            title: 'Утсгахдаа итгэлтэй байна уу?',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Устгах',
                            cancelButtonText: 'Гарах'
                        }).then(function () {
                            $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                            });
                            $.post( "{{ url('admin/category/delete') }}"+ "/" + id, function( data ) {
                                    $('#categorytable').DataTable().draw(false);
                                    swal(
                                        '',
                                        'Амжилттай устлаа',
                                        'success'
                                    )
                            });
                            })
                        }


             @if (session('categorytstatus'))
        	$.notify({
            	icon: 'fa fa-check',
            	message: " {{ session('categorytstatus') }}"

            },{
                type: 'success',
                timer: 2000
            });
           @endif
    </script>
@endpush