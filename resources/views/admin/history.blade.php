@extends('layouts.admin')

@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="header">
                                         <h4 class="title">Түүх</h4>
                                     </div>
                                </div>
                                <div class="col-md-3 col-md-offset-6">
                                     <div class="pull-right">
										<button class="btn btn-info btn-fill btn-icon btn-lg" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-plus"></i>
										</button>
									</div>
                                </div>
                            </div>
                             @if($histories->isEmpty())
                             <div class="header">
                                <div class="typo-line">
                                    <p class="category">Түүх байхгүй байна.</p>
                                </div>
                              </div>
                            @else
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Гарчиг</th>
                                            <th>Тайлбар</th>
                                        </thead>
                                        <tbody>
                                                @foreach ($histories as $history)
                                                <tr>
                                                    <td>{{ $history->id }}</td>
                                                    <td>{{ $history->title }}</td>
                                                    <td>{{ $history->description }}</td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
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
                         <form method="POST" action="{{ url('/admin/history') }}">
                                   <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Гарчиг:</label>
                                                <input type="text" class="form-control border-input" name='title' placeholder="Гарчиг">
                                            </div>
                                        </div>
                                    </div>

                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Тайлбар</label>
                                                <textarea class="form-control" name='description' placeholder="Тайлбар" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Огноо:</label>
                                                <input type="date" class="form-control" name="date">
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
            $('#lfm').filemanager('image');
            @if (session('historystatus'))
        	$.notify({
            	icon: 'fa fa-check',
            	message: " {{ session('historystatus') }}"

            },{
                type: 'success',
                timer: 2000
            });
           @endif
    </script>
@endpush