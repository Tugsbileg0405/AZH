@extends('layouts.admin')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                     <div class="col-md-12">
                        <div class="row admin-header">
                                <div class="col-xs-6">
                                    <div class="header">
                                        <h4 class="title">Хөтөлбөрүүд</h4>
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
                                                <table id="programtable" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>ID</th>
                                                            <th>Нэр</th>
                                                            <th>Хөтөлбөрийн ангилал</th>
                                                            <th>Үүсгэсэн огноо</th>
                                                            <th>Засварлах/Устгах</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Нэр</th>
                                                            <th>Хөтөлбөрийн ангилал</th>
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
                        <h4 class="modal-title">Хөтөлбөр нэмэх</h4>
                    </div>
                    <div class="modal-body">
                         <form method="POST" id="myform" action="{{ url('/admin/programs') }}">
                                   <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Хөтөлбөрийн нэр:</label>
                                                <input type="text" required class="form-control border-input" name='title' placeholder="Хөтөлбөрийн нэр">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Богино танилцуулга</label>
                                                <textarea rows="5" required class="form-control border-input" name="shortdescription" placeholder="Богино танилцуулга оруулна уу..."></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Хөтөлбөрийн тайлбар:</label>
                                                <textarea rows="5" required class="form-control my-editor border-input" name="description" placeholder="Контентоо оруулна уу..."></textarea>
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
                                                    <input id="thumbnail" class="form-control border-input"  type="text" name="filepath">
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
                                                    <option value="{{ $programName->id }}">{{ $programName->name }}</option>
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

@endsection

@push('script')
   <script type="text/javascript">
            $('#myform').bootstrapValidator({
             fields: {
                 title: {
                     validators: {
                         notEmpty: {
                             message: '* Талбарын утгыг бөглөнө үү'
                         }
                     }
                 },
                shortdescription: {
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
                programname: {
                     validators: {
                         notEmpty: {
                             message: '* Талбарын утгыг бөглөнө үү'
                         }
                     }
                 },
             }
         });


           var table = $('#programtable').DataTable({
                    processing: true,
                    serverSide: true,
                    iDisplayLength: 5,
                    dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    pagingType: "full_numbers",
                    ajax: '{!! route('datatables.allprograms') !!}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'title', name: 'title' },
                        { data: 'program_name.name', name: 'program_name.name' , orderable: false, searchable: false},
                        { data: 'created_at', name: 'created_at' },
                         {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });

                  function deleteProgram(id){
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
                            $.post( "{{ url('admin/allprograms/delete') }}"+ "/" + id, function( data ) {
                                    $('#programtable').DataTable().draw(false);
                                    swal(
                                        '',
                                        'Амжилттай устлаа',
                                        'success'
                                    )
                            });
                            })
                        }


            $('#lfm').filemanager('image');

            @if (session('programstatus'))
        	$.notify({
            	icon: 'fa fa-check',
            	message: " {{ session('programstatus') }}"

            },{
                type: 'success',
                timer: 2000
            });
           @endif
    </script>
@endpush