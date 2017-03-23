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
                                                        <th>Холбогдох хүний нэр</th>
                                                        <th>Холбогдох хүний дугаар</th>
                                                        <th>Холбогдох хүний и-мэйл</th>
                                                        <th>Огноо</th>
                                                        <th>Засварлах/Устгах</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Салбарын нэр</th>
                                                        <th>Холбогдох хүний нэр</th>
                                                        <th>Холбогдох хүний дугаар</th>
                                                        <th>Холбогдох хүний и-мэйл</th>
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
                                                        <option value="Улаанбаатар">Улаанбаатар</option>
                                                        <option value="Багануур">Багануур</option>
                                                        <option value="Багахангай">Багахангай</option>
                                                        <option value="Баянгол">Баянгол</option>
                                                        <option value="Баянзүрх">Баянзүрх</option>
                                                        <option value="Налайх">Налайх</option>
                                                        <option value="Сонгинохайрхан">Сонгинохайрхан</option>
                                                        <option value="Сүхбаатар">Сүхбаатар</option>
                                                        <option value="Хан-Уул">Хан-Уул</option>
                                                        <option value="Чингэлтэй">Чингэлтэй</option>
                                                        <option value="Архангай">Архангай</option>
                                                        <option value="Баян-Өлгий">Баян-Өлгий</option>
                                                        <option value="Баянхонгор">Баянхонгор</option>
                                                        <option value="Булган">Булган</option>
                                                        <option value="Говь-Алтай">Говь-Алтай</option>
                                                        <option value="Говьсүмбэр">Говьсүмбэр</option>
                                                        <option value="Дархан-Уул">Дархан-Уул</option>
                                                        <option value="Дорноговь">Дорноговь</option>
                                                        <option value="Дорнод">Дорнод</option>
                                                        <option value="Дундговь">Дундговь</option>
                                                        <option value="Завхан">Завхан</option>
                                                        <option value="Орхон">Орхон</option>
                                                        <option value="Өвөрхангай">Өвөрхангай</option>
                                                        <option value="Өмнөговь">Өмнөговь</option>
                                                        <option value="Сүхбаатар">Сүхбаатар</option>
                                                        <option value="Сэлэнгэ">Сэлэнгэ</option>
                                                        <option value="Төв">Төв</option>
                                                        <option value="Увс">Увс</option>
                                                        <option value="Ховд">Ховд</option>
                                                        <option value="Хөвсгөл">Хөвсгөл</option>
                                                        <option value="Хэнтий">Хэнтий</option>
                                                  </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label>Байршил:</label>
                                                 <div id="map" style="height:500px"></div>
                                                 <input type="hidden" value="47.913138" name="lat" id="lat">
                                                 <input type="hidden" value="106.920123" name="lon" id="lon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label>Холбогдох хүний нэр:</label>
                                                <input type="text" required class="form-control border-input" name='cpersonname' placeholder="Холбогдох хүний нэр">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label>Холбогдох хүний дугаар:</label>
                                                <input type="text" required class="form-control border-input" name='cpersonphone' placeholder="Холбогдох хүний дугаар">
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label>Холбогдох хүний и-мэйл:</label>
                                                <input type="email" class="form-control border-input" required name='cpersonemail' placeholder="Холбогдох хүний и-мэйл">
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
    <script async defer 
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAChBN0MVMVMizgvWhVZBFZ3afH4xWNGhQ&sensor=false&libraries=places&callback=initMap">
    </script>
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
                        { data: 'name', name: 'name' },
                        { data: 'c_person_name', name: 'c_person_name' },
                        { data: 'c_person_phone', name: 'c_person_phone' },
                        { data: 'c_person_email', name: 'c_person_email' },
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


                function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 10,
                    center: { lat: 47.913138, lng: 106.920123 },
                });

                marker = new google.maps.Marker({
                        position: { lat: 47.913138, lng: 106.920123 },
                        map: map                    
                })

                google.maps.event.addListener(map, "click", function (e) {
                    var lat = e.latLng.lat();
                    var lon = e.latLng.lng();
                    marker.setPosition(new google.maps.LatLng(lat, lon));
                    $('#lat').val(lat);
                    $('#lon').val(lon);
                });

                $('#myModal').on('shown.bs.modal', function () {
                    google.maps.event.trigger(map, "resize");
                });
            }

          

             @if (session('locationstatus'))
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