@extends('layouts.admin')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header">
                                <h4 class="title">Бүртгэлтэй хэрэглэгчид</h4>
                        </div>
                          <div class="card">
                            <div class="content">
                                <div class="toolbar">
                                </div>
                                <div class="fresh-datatables">
                                    <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="usertable" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>ID</th>
                                                            <th>Нэр</th>
                                                            <th>И-мэйл</th>
                                                            <th>Үүсгэсэн огноо</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Нэр</th>
                                                            <th>И-мэйл</th>
                                                            <th>Үүсгэсэн огноо</th>
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
          var table = $('#usertable').DataTable({
                    processing: true,
                    serverSide: true,
                    iDisplayLength: 5,
                    dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    pagingType: "full_numbers",
                    ajax: '{!! route('datatables.getallusers') !!}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'created_at', name: 'created_at' },
                    ]
                });
               

</script>

@endpush