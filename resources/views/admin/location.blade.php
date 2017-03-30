@extends('layouts.admin')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                        <div class="row admin-header">
                                <div class="col-xs-6">
                                    <div class="header">
                                        <h4 class="title">Салбарууд</h4>
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
                                            <table id="locationtable" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th>ID</th>
                                                        <th>Салбарын нэр</th>
                                                        <th>Тэргүүний нэр</th>
                                                        <th>Утасны дугаар</th>
                                                        <th>И-мэйл</th>
                                                        <th>Facebook хаяг</th>
                                                        <th>Нэмэлт мэдээлэл</th>
                                                        <th>Огноо</th>
                                                        <th>Засварлах/Устгах</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Салбарын нэр</th>
                                                        <th>Тэргүүний нэр</th>
                                                        <th>Утасны дугаар</th>
                                                        <th>И-мэйл</th>
                                                        <th>Facebook хаяг</th>
                                                        <th>Нэмэлт мэдээлэл</th>
                                                        <th>Огноо</th>
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
                        <h4 class="modal-title">Салбар нэмэх</h4>
                    </div>
                    <div class="modal-body">
                         <form method="POST" id="myform" action="{{ url('/admin/location') }}">
                                   <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Аймаг/Дүүрэг нэр:</label>
                                                  <select class="form-control" required name='name'>
                                                        <option value="">Аймаг/Дүүрэг нэр</option>
                                                        @foreach($provinces as $province)
                                                        <option value="{{$province->id}}">{{$province->name}}</option>
                                                        @endforeach
                                                  </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label>Тэргүүний нэр:</label>
                                                <input type="text" required class="form-control border-input" name='cpersonname' placeholder="Тэргүүний нэр">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label>Утасны дугаар:</label>
                                                <input type="text" required class="form-control border-input" name='cpersonphone' placeholder="Утасны дугаар">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label>И-мэйл:</label>
                                                <input type="email" class="form-control border-input" required name='cpersonemail' placeholder="И-мэйл">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label>Facebook хаяг:</label>
                                                <input type="text" class="form-control border-input"  name='cpersonfacebook' placeholder="Facebook хаяг">
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label>Нэмэлт мэдээлэл:</label>
                                                <textarea rows="5" class="form-control border-input"  name='information' placeholder="Нэмэлт мэдээлэл"></textarea>
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
                    },
                    cpersonname: {
                        validators: {
                            notEmpty: {
                                message: '* Талбарын утгыг бөглөнө үү'
                            }
                        }
                    },
                    cpersonphone: {
                        validators: {
                            notEmpty: {
                                message: '* Талбарын утгыг бөглөнө үү'
                            }
                        }
                    },
                    cpersonemail: {
                        validators: {
                            notEmpty: {
                                message: '* Талбарын утгыг бөглөнө үү'
                            },
                            emailAddress: {
                            message: '* И-мэйл хаяг биш байна.'
                            }
                        }
                    },
                }
            });

                 var table = $('#locationtable').DataTable({
                    processing: true,
                    serverSide: true,
                    iDisplayLength: 5,
                    dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    pagingType: "full_numbers",
                    ajax: '{!! route('datatables.getalllocations') !!}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'province.name', name: 'province.name' },
                        { data: 'c_person_name', name: 'c_person_name' },
                        { data: 'c_person_phone', name: 'c_person_phone' },
                        { data: 'c_person_email', name: 'c_person_email' },
                        { data: 'c_person_facebook', name: 'c_person_facebook' },
                        { data: 'information', name: 'information' },
                        { data: 'created_at', name: 'created_at' },
                         {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });

                  function deleteLocation(id){
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
                            $.post( "{{ url('admin/alllocations/delete') }}"+ "/" + id, function( data ) {
                                    $('#locationtable').DataTable().draw(false);
                                    swal(
                                        '',
                                        'Амжилттай устлаа',
                                        'success'
                                    )
                            });
                            })
                      }

           $('#myform').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()) {
                    $("body").loading();
                }
            })

            @if (session('locationstatus'))
            $("body").loading('stop');
        	$.notify({
            	icon: 'fa fa-check',
            	message: " {{ session('locationstatus') }}"

            },{
                type: 'success',
                timer: 2000
            });
           @endif
    </script>
@endpush