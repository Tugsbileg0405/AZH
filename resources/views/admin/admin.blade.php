@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
           <div class="col-md-12">
                 <div class="row admin-header">
                         <div class="col-xs-6">
                             <div class="header">
                                 <h4 class="title">Оруулсан мэдээнүүд</h4>
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
                                        <table id="news-table" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>ID</th>
                                                    <th>Гарчиг</th>
                                                    <th>Хэрэглэгч</th>
                                                    <th>Холбоотой салбар</th>
                                                    <th>Үүсгэсэн огноо</th>
                                                    <th>Засварлах/Устгах</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Гарчиг</th>
                                                    <th>Хэрэглэгч</th>
                                                    <th>Холбоотой салбар</th>
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
                <h4 class="modal-title">Мэдээ оруулах</h4>
            </div>
            <div class="modal-body">
                      <form method="POST" id="myform" action="{{ url('/admin/addnews') }}">
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
                                         <div class="result"></div>
                                     </div>
                                      <p class="warning">* 800x600 хэмжээтэй зураг тохиромжтой.</p>
                                 </div>
                             </div>

                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Богино танилцуулга</label>
                                        <textarea rows="5" class="form-control border-input" required name="shortdescription" placeholder="Богино танилцуулга оруулна уу..."></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Контент</label>
                                        <textarea rows="5" class="form-control my-editor border-input" required name="description" placeholder="Контентоо оруулна уу..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ангилал</label>
                                        <select class="form-control" required name="category" style="border: 1px solid #CCC5B9">
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Салбар</label>
                                        <select class="form-control" required name="location" style="border: 1px solid #CCC5B9">
                                                    @foreach($provinces as $province)
                                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                    @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Мэдээ оруулах</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('script')
<script>
        function deleteNews(id){
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
             $.post( "{{ url('admin/news/delete') }}"+ "/" + id, function( data ) {
                    $('#news-table').DataTable().draw(false);
                    swal(
                        '',
                        'Амжилттай устлаа',
                        'success'
                    )
            });
            })
        }
        
        $("#myModal").on("show.bs.modal", function(e) {
        var id = $(e.relatedTarget).data('target-id');
        $.get("{{ url('admin/news/edit') }}"+ "/" + id, function( data ) {
            console.log(data);
        });
        
      });    

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
                   category: {
                     validators: {
                         notEmpty: {
                             message: '* Талбарын утгыг бөглөнө үү'
                         }
                     }
                 },    
                location: {
                     validators: {
                         notEmpty: {
                             message: '* Талбарын утгыг бөглөнө үү'
                         }
                     }
                 },
             }
         });
</script>
<script>
     $( document ).ready(function() {
       var table = $('#news-table').DataTable({
            processing: true,
            serverSide: true,
            iDisplayLength: 5,
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            pagingType: "full_numbers",
            ajax: '{!! route('datatables.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'user.name', name: 'user.name' },
                { data: 'sector.name', name: 'sector.name' },
                { data: 'created_at', name: 'created_at' },
                 {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

            $('#myform').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()) {
                    $("body").loading();
                }
            })
        
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
           

            var photos = $('.photos');
            var result = $('.result');
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
                    url: '{{ url("admin/storeaphoto/800/600") }}',
                    data: new FormData(input.closest('form')[0]),
                    contentType: false,
                    processData: false,
                }).done(function(data) {
                    input.val(null);
                    browse.find('.fa').show();
                    browse.find('.wait').hide();
                    result.html(data);
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
    });
</script>

@endpush