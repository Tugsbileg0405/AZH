@extends('layouts.admin')

@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row admin-header">
                                <div class="col-xs-6">
                                    <div class="header">
                                        <h4 class="title">Түүх</h4>
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
                                                    <table id="historytable" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th>ID</th>
                                                                <th>Гарчиг</th>
                                                                <th>Тайлбар</th>
                                                                <th>Түүхийн огноо</th>
                                                                <th>Үүсгэсэн огноо</th>
                                                                <th>Засварлах/Устгах</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Гарчиг</th>
                                                                <th>Тайлбар</th>
                                                                <th>Түүхийн огноо</th>
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
                        <h4 class="modal-title">Түүх нэмэх</h4>
                    </div>
                    <div class="modal-body">
                         <form method="POST" id="myform" action="{{ url('/admin/history') }}">
                                   <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Гарчиг:</label>
                                                <input type="text" required class="form-control border-input" name='title' placeholder="Гарчиг">
                                            </div>
                                        </div>
                                    </div>

                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Тайлбар</label>
                                                <textarea class="form-control" name='description' required  placeholder="Тайлбар" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Огноо:</label>
                                                <input type="date" required class="form-control" name="date">
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Зураг</label>
                                                <input type="file" name="file" style="display: none">
                                            </div>
                                             <div class="photos">
                                                <div class="browse">
                                                    <i class="fa fa-image fa-3x" aria-hidden="true"></i>
                                                    <div class="wait">
                                                        <div class="loader"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="warning">* 800x600 хэмжээтэй зураг тохиромжтой.</p>
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
                        description: {
                            validators: {
                                notEmpty: {
                                    message: '* Талбарын утгыг бөглөнө үү'
                                }
                            }
                        },
                        date: {
                            validators: {
                                notEmpty: {
                                    message: '* Талбарын утгыг бөглөнө үү'
                                }
                            }
                        },
                    }
                });

                   var table = $('#historytable').DataTable({
                    processing: true,
                    serverSide: true,
                    iDisplayLength: 5,
                    dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    pagingType: "full_numbers",
                    ajax: '{!! route('datatables.getallhistory') !!}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'title', name: 'title' },
                        { data: 'description', name: 'description' },
                        { data: 'date', name: 'date' },
                        { data: 'created_at', name: 'created_at' },
                         {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });

                  function deleteHistory(id){
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
                            $.post( "{{ url('admin/allhistory/delete') }}"+ "/" + id, function( data ) {
                                    $('#historytable').DataTable().draw(false);
                                    swal(
                                        '',
                                        'Амжилттай устлаа',
                                        'success'
                                    )
                            });
                            })
            }
            
            $('#lfm').filemanager('image');

            $('#myform').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()) {
                    $("body").loading();
                }
            })

            @if (session('historystatus'))
            $("body").loading('stop');
        	$.notify({
            	icon: 'fa fa-check',
            	message: " {{ session('historystatus') }}"

            },{
                type: 'success',
                timer: 2000
            });
           @endif

           
    var photos = $('.photos');
    var browse = $('.browse');
    var input = $('input[name=file]');
    browse.click(function() {
        input.click();
    });
    input.change(function() {
        browse.find('.fa').hide();
        browse.find('.wait').show();
        $.ajax({
            type: 'POST',
            url: '{{ url("admin/storephoto/800/600") }}',
            data: new FormData(input.closest('form')[0]),
            contentType: false,
            processData: false,
        }).done(function(data) {
            input.val(null);
            browse.find('.fa').show();
            browse.find('.wait').hide();
            photos.append(data);
        }).fail(function() {
            browse.find('.fa').show();
            browse.find('.wait').hide();
        });
    });
    $(document).on('click', '.photo .fa', function() {
        var photo = $(this).closest('.photo');
        var path = photo.find('input').val();
        photo.find('.fa').hide();
        photo.find('.wait').show();
        $.ajax({
            type: 'POST',
            url: '{{ url("admin/deletephoto") }}',
            data: {
                'path': path,
                '_token': '{{ csrf_token() }}'
            },
        }).done(function(data) {
            photo.remove();
        }).fail(function() {
            photo.find('.fa').show();
            photo.find('.wait').hide();
        });
    });
    </script>
@endpush