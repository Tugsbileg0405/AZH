@extends('layouts.admin') @section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="header">
                    <h4 class="title">Мэдээлэл</h4>
                </div>
                <div class="content">
                    <div class="row">
                        <form method="POST"  action="{{ url('/admin/options', 1) }}">
                            <div class="col-lg-4 col-sm-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Нэр</label>
                                                            <input type="text" class="form-control border-input" required name='name' value="{{$sectors->name}}" placeholder="Нэр">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Тайлбар</label>
                                                            <input type="text" class="form-control border-input" required name='value' value="{{$sectors->value}}" placeholder="Тайлбар">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <hr>
                                        <button class="btn btn-info btn-fill btn-sm" type="submit">
                                             Хадгалах
                                         </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="POST"  action="{{ url('/admin/options', 2) }}">
                            <div class="col-lg-4 col-sm-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Нэр</label>
                                                            <input type="text" class="form-control border-input" required name='name' value="{{$members->name}}" placeholder="Нэр">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Тайлбар</label>
                                                            <input type="text" class="form-control border-input" required name='value' value="{{$members->value}}" placeholder="Тайлбар">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <hr>
                                        <button class="btn btn-info btn-fill btn-sm" type="submit">
                                             Хадгалах
                                         </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="POST"  action="{{ url('/admin/options', 3) }}">
                            <div class="col-lg-4 col-sm-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Нэр</label>
                                                            <input type="text" class="form-control border-input" required name='name' value="{{$projects->name}}" placeholder="Нэр">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Тайлбар</label>
                                                            <input type="text" class="form-control border-input" required name='value' value="{{$projects->value}}" placeholder="Тайлбар">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <hr>
                                        <button class="btn btn-info btn-fill btn-sm" type="submit">
                                             Хадгалах
                                         </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection @push('script')
<script type="text/javascript">
    $(document).ready(function() {
          
        @if(session('optionstatus'))
        $.notify({
            icon: 'fa fa-check',
            message: " {{ session('optionstatus') }}"

        }, {
            type: 'success',
            timer: 1000
        });
        @endif
    });
</script>
@endpush