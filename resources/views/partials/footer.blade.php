<footer class="footer footer-big footer-color-blue " data-color="black ">
        <div class="container ">
            <div class="row ">
                <div class="col-md-2 col-sm-2 ">
                    <div class="info ">
                        <div class="text-xs-center text-lg-center image-logo">
                            <img src="{{asset('img/logo/group.png')}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 ">
                    <div class="info ">
                        <h5 class="title ">Тухай</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="{{url('about?name=home')}}">Товч танилцуулга</a></li>
                                <li>
                                    <a href="{{url('about?name=rule')}}">Холбооны дүрэм</a>
                                </li>
                                <li>
                                    <a href="{{url('about?name=structure')}}">Удирдах зөвлөл</a>
                                </li>
                                <li>
                                    <a href="{{url('programs')}}">Хөтөлбөр</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            <div class="col-md-2 col-sm-2 ">
                    <div class="info ">
                        <h5 class="title ">Мэдээ</h5>
                        <nav>
                            <ul>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{url('category',$category->id)}}">{{$category->name}}</a>
                                </li>
                            @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 ">
                    <div class="info ">
                        <h5 class="title ">Холбогдох</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="{{url('contact')}}">
                                        <table>
                                            <tr>
                                                <td style="vertical-align: top;padding-right:15px "><i class="fa fa-map-marker "></i></td>
                                                <td> Улаанбаатар хот, Сүхбаатар дүүрэг,<br> 5-р хороо, Д.Сүхбаатарын талбай - 2, Сентрал тауэр, 1010а тоот</td>
                                            </tr>
                                        </table>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('contact')}}">
                                        <table>
                                            <tr>
                                                <td style="vertical-align: top;padding-right:15px "><i class="fa fa-phone "></i></td>
                                                <td> 7777-9494</td>
                                            </tr>
                                        </table>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('contact')}}">
                                        <table>
                                            <tr>
                                                <td style="vertical-align: top;padding-right:15px "><i class="fa fa-envelope "></i></td>
                                                <td> info@demyouth.mn</td>
                                            </tr>
                                        </table>

                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 ">
                    <div class="info ">
                        <h5 class="title ">Мэдээлэл хүлээж авах</h5>
                        
                        <nav>
                            <ul>
                                <form id="subscribeform">
                                     <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                    <li style="margin-bottom: 10px ">
                                        <input type="email" autocomplete="off" required class="input-sbr " name="email" placeholder="Таны цахим шуудан: ">
                                    </li>
                                    <li>
                                        <button class="btn btn-white" type="submit">Бүртгүүлэх</button>
                                    </li>
                                </form>
                            </ul>
                        </nav>
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright ">
        <div class="container ">
            <div class="row ">
                <div class="col-md-8 ">
                    © Монголын Ардчилсан Залуучуудын Холбоо. <?php echo (new DateTime)->format("Y"); ?>
                </div>
                <div class="col-md-2 ">
                    <div class="dropup">
                        <button class="btn btn-default dropdown-toggle" style="text-transform: none" type="button" data-toggle="dropdown">
                            <i class="fa fa-globe "></i>
                            <span class="chosen-language "></span>
                            <span class="fa fa-angle-up "></span>
                        </button>
                        <ul id="language" class="dropdown-menu">
                            <li><a data-type="mn">Монгол</a></li>
                            <li><a data-type="en">English</a></li>
                        </ul>
                        <input id="langugeValue" type="hidden" data-start-type="mn" />
                    </div>
                </div>
                <div class="col-md-2 ">
                    <div class="btn-social ">
                        <a class="btn-simple" href="https://www.facebook.com/demyouth/" target="_blank">
                            <i class="fa fa-facebook "></i>
                        </a>
                        <a class="btn-simple" href="https://twitter.com/demyouth" target="_blank">
                            <i class="fa fa-twitter "></i>
                        </a>
                        <a class="btn-simple" href="https://www.youtube.com/channel/UCasjnvbRtGJqOJu06h1LvJA?sub_confirmation=1" target="_blank">
                            <i class="fa fa-youtube "></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script> 
            $(function(){
                $('#subscribeform').on('submit',function(e){
                    $.ajaxSetup({
                        header:$('meta[name="_token"]').attr('content')
                    })
                    e.preventDefault(e);
                        $.ajax({
                        type:"POST",
                        url:'{{ url("/subscribe") }}',
                        data:$(this).serialize(),
                        dataType: 'json',
                        success: function(data){
                            if(data.responseText === "success"){
                                	$.notify({
                                        icon: 'fa fa-check',
                                        message: "Дагасанд баярлалаа."

                                    },{
                                        type: 'success',
                                        timer: 1000
                                    });
                            }else{
                                	$.notify({
                                        icon: 'fa fa-info-circle',
                                        message: "Та манай хуудсыг дагасан байна."

                                    },{
                                        type: 'info',
                                        timer: 1000
                                    });
                            }
                        },
                        error: function(data){

                        }
                    })
                    });
                });
        </script>
    @endpush