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
                                    <div class="col-sm-12">
                                        <table id="news-table" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
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
                            </div>
                        </div>
                    </div>
                </div>
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
            iDisplayLength: 5,
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            pagingType: "full_numbers",
            ajax: '{!! route('datatables.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'user.name', name: 'user.name', orderable: false, searchable: false },
                { data: 'created_at', name: 'created_at' },
                 {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        
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