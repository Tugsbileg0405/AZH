@extends('layouts.admin')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header">
                                <h4 class="title">Cанал хүсэлтүүд</h4>
                            </div>
                        <div class="card">
                            <div class="content">
                                <div class="toolbar">
                                </div>
                                <div class="fresh-datatables">
                                    <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="contacttable" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>ID</th>
                                                            <th>И-мэйл</th>
                                                            <th>Мессеж</th>
                                                            <th>Утас</th>
                                                            <th>Салбар</th>
                                                            <th>Огноо</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>И-мэйл</th>
                                                            <th>Мессеж</th>
                                                            <th>Утас</th>
                                                            <th>Салбар</th>
                                                            <th>Огноо</th>
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
          var table = $('#contacttable').DataTable({
                    processing: true,
                    serverSide: true,
                    iDisplayLength: 5,
                    dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    pagingType: "full_numbers",
                    ajax: '{!! route('datatables.getallcontact') !!}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'c_email', name: 'c_email' },
                        { data: 'c_message', name: 'c_message' },
                        { data: 'c_phone', name: 'c_phone' },
                        { data: 'sector.name', name: 'sector.name' },
                        { data: 'created_at', name: 'created_at' },
                    ]
                });
               

</script>

@endpush