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
                                         <h4 class="title">Түгээмэл асуулт хариултууд</h4>
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
                             @if($faqs->isEmpty())
                             <div class="header">
                                <div class="typo-line">
                                    <p class="category">Түгээмэл асуулт хариулт байхгүй байна.</p>
                                </div>
                              </div>
                            @else
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Асуулт</th>
                                            <th>Хариулт</th>
                                        </thead>
                                        <tbody>
                                                @foreach ($faqs as $faq)
                                                <tr>
                                                    <td>{{ $faq->id }}</td>
                                                    <td>{{ $faq->question }}</td>
                                                    <td>{{ $faq->answer }}</td>
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
                        <h4 class="modal-title">Асуулт нэмэх</h4>
                    </div>
                    <div class="modal-body">
                         <form method="POST" action="{{ url('/admin/faq') }}">
                                   <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Асуулт:</label>
                                                <input type="text" class="form-control border-input" name='question' placeholder="Асуулт">
                                            </div>
                                        </div>
                                    </div>


                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Хариулт</label>
                                                <textarea class="form-control" name='answer' placeholder="Хариулт" rows="3"></textarea>
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

             @if (session('faqstatus'))
        	$.notify({
            	icon: 'fa fa-check',
            	message: " {{ session('faqstatus') }}"

            },{
                type: 'success',
                timer: 2000
            });
           @endif
    </script>
@endpush