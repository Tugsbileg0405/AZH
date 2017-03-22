@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="header">
                    <h4 class="title">Оруулсан мэдээнүүд</h4>
                </div>


               <div class="card">
    <div class="content">
        <div class="toolbar">
        </div>
        <div class="fresh-datatables">
            <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="datatables_length"><label>Show <select name="datatables_length" aria-controls="datatables" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="-1">All</option></select> entries</label></div>
                    </div>
                    <div class="col-sm-6">
                        <div id="datatables_filter" class="dataTables_filter"><label><input type="search" class="form-control input-sm" placeholder="Search records" aria-controls="datatables"></label></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="news-table" class="table table-striped table-no-bordered table-hover dataTable dtr-inline collapsed" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th>ID</th>
                                    <th>Гарчиг</th>
                                    <th>Хэрэглэгч</th>
                                    <th>Үүсгэсэн огноо</th>
                                    <th>Засварлах/Устгах</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                     <th>ID</th>
                                     <th>Гарчиг</th>
                                     <th>Хэрэглэгч</th>
                                     <th>Үүсгэсэн огноо</th>
                                     <th>Засварлах/Устгах</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="datatables_info" role="status" aria-live="polite">Showing 1 to 10 of 25 entries</div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_full_numbers" id="datatables_paginate">
                            <ul class="pagination">
                                <li class="paginate_button first disabled" id="datatables_first"><a href="#" aria-controls="datatables" data-dt-idx="0" tabindex="0">First</a></li>
                                <li class="paginate_button previous disabled" id="datatables_previous"><a href="#" aria-controls="datatables" data-dt-idx="1" tabindex="0">Previous</a></li>
                                <li class="paginate_button active"><a href="#" aria-controls="datatables" data-dt-idx="2" tabindex="0">1</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="datatables" data-dt-idx="3" tabindex="0">2</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="datatables" data-dt-idx="4" tabindex="0">3</a></li>
                                <li class="paginate_button next" id="datatables_next"><a href="#" aria-controls="datatables" data-dt-idx="5" tabindex="0">Next</a></li>
                                <li class="paginate_button last" id="datatables_last"><a href="#" aria-controls="datatables" data-dt-idx="6" tabindex="0">Last</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                <div class="card">
                    <div class="content">
                        <div class="fresh-datatables">
                            <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <table id="news-table" class="table table-striped table-no-bordered table-hover dataTable dtr-inline">
                                <thead>
                                    <tr role="row">
                                        <th>ID</th>
                                        <th>Гарчиг</th>
                                        <th>Хэрэглэгч</th>
                                        <th>Үүсгэсэн огноо</th>
                                        <th>Засварлах/Устгах</th>
                                    </tr>
                                </thead>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/admin/addnews') }}">
                    <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Гарчиг</label>
                                <input type="text" class="form-control border-input" name='title' placeholder="Гарчиг">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ковер зураг</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                         <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info btn-fill ">
                                         <i class="fa fa-picture-o"></i> Сонгох
                                         </a>
                                    </span>
                                    <input id="thumbnail" class="form-control border-input" type="text" name="filepath">
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Контент</label>
                                <textarea rows="5" class="form-control my-editor border-input" name="description" placeholder="Контентоо оруулна уу...">
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ангилал</label>
                                <select class="form-control" style="border: 1px solid #CCC5B9">
                                    
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Мэдээ засах</button>
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
</script>
<script>
     $( document ).ready(function() {

       var table = $('#news-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'user.name', name: 'user.name' },
                { data: 'created_at', name: 'created_at' },
                 {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        
        $('#datatables_filter input').on( 'keyup', function () {
            table.search( this.value ).draw();
        } );

            @if (session('status'))
        	$.notify({
            	icon: 'ti-check',
            	message: " {{ session('status') }}"

            },{
                type: 'success',
                timer: 2000
            });
           @endif
    });
</script>

@endpush