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
                                         <h4 class="title">Салбаруудын мэдээлэл</h4>
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
                             @if($sectorInfos->isEmpty())
                             <div class="header">
                                <div class="typo-line">
                                    <p class="category">Салбарын мэдээдэл байхгүй байна.</p>
                                </div>
                              </div>
                            @else
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Гарчиг</th>
                                            <th>Салбар</th>
                                        </thead>
                                        <tbody>
                                                @foreach ($sectorInfos as $sectorInfo)
                                                <tr>
                                                    <td>{{ $sectorInfo->id }}</td>
                                                    <td>{{ $sectorInfo->title }}</td>
                                                    <td>{{ $sectorInfo->sector->name }}</td>
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
                        <h4 class="modal-title">Салбарын мэдээлэл нэмэх</h4>
                    </div>
                    <div class="modal-body">
                         <form method="POST" action="{{ url('/admin/sector') }}">
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
                                                <label>Тайлбар:</label>
                                                <textarea class="form-control my-editor" name='description' placeholder="Тайлбар" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Салбарын байрлал:</label>
                                                <select class="form-control" name="location">
                                                    <option value="">Cалбараас сонгоно уу</option>
                                                    @foreach($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                    @endforeach
                                            </select>
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
            @if (session('sectorstatus'))
        	$.notify({
            	icon: 'fa fa-check',
            	message: " {{ session('sectorstatus') }}"

            },{
                type: 'success',
                timer: 2000
            });
           @endif
    </script>
@endpush