@extends('layouts.app') 

@section('content')
<div class="section section-program">
    <div class="container">
        <div class="row">
            <div class="section section-our-projects">
                    <div class="header-faq text-center">
                        <h2>Хөтөлбөрүүд</h2>
                        <div class="separator separator-danger">✻</div>
                    </div>
                         <div class="container">
                             <div class="row">
                                <div class="col-md-12" style="margin-bottom:20px">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                             <span class="chosen-programname"></span>
                                             <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" id="programs">
                                            <li data-type="0" data-id="0"><a href="#">Бүх хөтөлбөрүүд</a></li>
                                            @if(!$programNames->isEmpty())
                                            @foreach($programNames as $index => $programname)
                                            <li data-type="{{$programname->id}}" data-id="{{$programname->id}}"><a href="#">{{$programname->name}}</a></li>
                                            @endforeach
                                            @endif
                                        </ul>
                                         <input id="programNameValue" type="hidden" data-start-type="@if($startid) {{$startid}} @else 0 @endif" />
                                    </div>
                                </div>
                                <div class="col-md-12 loader-div" style="display:none">
                                       <div class="loader"></div>
                                </div>
                                    <div class="programs">
                                       
                                    </div>
                                    <div class="col-md-12" style="text-align:center">
                                        <div class="noContent" style="display:none">
                                                <div class="content">
                                                    <p class="text-gray">Хөтөлбөр байхгүй байна.</p>
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
        $(document).ready(function () {
          var data_start_type = $('#programNameValue').attr('data-start-type');
          var $data_type_elem = $('[data-type=' + data_start_type + ']');
          $('.chosen-programname').text($data_type_elem.text());
          search(data_start_type);

          
          $('#programs li').on('click', function () {
              var id = $(this).data('id');
             $('.chosen-programname').text($(this).text());
             search(id);
          });


          function search(id){
                $('.programs').empty();
                $('.loader-div').css('display','block');
                $('.noContent').css('display','none');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.get("{{ url('programname') }}"+ "/" + id, function( data ) {
                if(data.length > 0){
                       data.forEach(function(program){
                        $( ".programs" ).append( '<div class="col-md-6">\
                               <div class="project">\
                                     <img src="{{ asset('') }}'+program.image+'">\
                                     <a class="over-area" href="{{ url("program") }}/'+program.id +'">\
                                         <div class="content">\
                                             <h2>'+ program.title + '</h2>\
                                             <p>' + program.short_description + '</p>\
                                         </div>\
                                     </a>\
                                 </div>\
                            </div>' );
                        })
                        $('.loader-div').css('display','none');
                }
                else{
                    $('.loader-div').css('display','none');
                    $('.noContent').css('display','block');
                }
            });
          }
        })
    </script>
@endpush