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
                                         <h4 class="title">Слайд</h4>
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
                             @if($slides->isEmpty())
                             <div class="header">
                                <div class="typo-line">
                                    <p class="category">Cлайд байхгүй байна.</p>
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
                                                @foreach ($slides as $slide)
                                                <tr>
                                                    <td>{{ $slide->id }}</td>
                                                    <td>{{ $slide->title }}</td>
                                                    <td>{{ $slide->description }}</td>
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
                        <h4 class="modal-title">Слайд нэмэх</h4>
                    </div>
                    <div class="modal-body">
                         <form method="POST" action="{{ url('/admin/slide') }}">
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
                                                <input type="text" class="form-control border-input" name='description' placeholder="Тайлбар">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label>Зураг:</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info btn-fill ">
                                                        <i class="fa fa-picture-o"></i> Сонгох
                                                        </a>
                                                    </span>
                                                    <input id="thumbnail" class="form-control border-input"  type="text" name="filepath">
                                                </div>
                                                <img id="holder" style="margin-top:15px;max-height:100px;">
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Товч гаргах эсэх:</label>
                                                 <label class="radio">
                                                     <input type="radio" class="isBtn" data-toggle="radio" name="isButton" value="1">
                                                     Тийм
                                                 </label>
                                                 <label class="radio">
                                                     <input type="radio" checked  class="isBtn" data-toggle="radio" name="isButton" value="0">
                                                     Үгүй
                                                 </label>
                                            </div>
                                        </div>
                                    </div>
                                       
                                    <div class="buttonInfo">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Товчны текст:</label>
                                                <input type="text" class="form-control border-input " name='btnText' placeholder="Товчны текст">
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Товчны линк:</label>
                                                <input type="text" class="form-control border-input" name='btnLink' placeholder="Товчны линк">
                                            </div>
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

              $('.buttonInfo').hide();
                $("input[name=isButton]").on( "change", function() {
                    if ($("input[name=isButton]").parent().hasClass('checked')) {
                            if($("input[name=isButton]:checked").val() == 0){
                                $('.buttonInfo').hide();
                            }
                            else {
                                $('.buttonInfo').show();
                            }
                        }
                    
                });

             @if (session('slidestatus'))
        	$.notify({
            	icon: 'fa fa-check',
            	message: " {{ session('slidestatus') }}"

            },{
                type: 'success',
                timer: 2000
            });
           @endif
      
    </script>
@endpush