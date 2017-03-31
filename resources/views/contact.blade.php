@extends('layouts.app')

@include('partials.navbarNoTrans')

  <div class="section section-contact-us">
        <div class="contact-container">
            <div class="map">
                <div class="google-map big-map" style="height: 640px">
                </div>
                @foreach($locations as $location)
                <div class="locations" data-lat="{{ $location->province->latitude }}" data-lng="{{ $location->province->longitude }}" data-cname="{{ $location->c_person_name }}" data-cemail="{{ $location->c_person_email }}" data-cphone="{{ $location->c_person_phone }}" data-cfacebook="{{ $location->c_person_facebook }}" data-information="{{ $location->information }}"></div>
                @endforeach
            </div>
        </div>
        <div class="section section-contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-1 text-left">
                                <div class="contact-form">
                                    <div class="title-area">
                                        <h2>Захидал илгээх</h2>
                                    </div>
                                    <form action="{{ url('/contact') }}" id="contact-form" method="POST" data-toggle="validator">
                                        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Таны цахим шуудан:</label>
                                                    <input type="email" autocomplete="off" name="email" value="" required placeholder="Цахим шуудангийн хаягаа оруулана уу" class="form-control form-control-warning form-control-plain">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Таны илгээх захидал:</label>
                                                    <textarea name="message" autocomplete="off" required class="form-control form-control-plain" placeholder="Та бидэнд илгээх захидалаа бичнэ үү" rows="8"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Илгээх салбар сонгох</label>
                                                    <select class="form-control" name="location" required>
                                                            <option value="">Та МЗХ-ны салбараас сонгоно уу</option>
                                                            @foreach($provinces as $provinces)
                                                            <option value="{{ $provinces->id }}">{{ $provinces->name }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Таны утас:</label>
                                                    <input required type="text" autocomplete="off" name="phone" value="" placeholder="Та холбоо барих утасны дугаараа оруулана уу" class="form-control form-control-plain">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6"></div>
                                                <div class="col-md-6 text-right" style="padding: 0">
                                                    <button type="submit" class="btn btn-dark">
                                                              Contact Us
                                                              <i class="fa fa-paper-plane"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <div class="contact-form">
                                    <div class="title-area">
                                        <h2>Түгээмэл асуулт хариултууд</h2>
                                    </div>
                                        <div class="row">
                                            <div class="col-md-12 text-left">
                                                <div class="panel-group" id="accordion">
                                                    @if($faqs->isEmpty())
                                                        <p>Түгээмэл асуулт хариулт байхгүй байна.</p>
                                                    @else
                                                    @foreach($faqs as $index => $faq)
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h2 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $faq->id }}">{{ $faq->question }}</a>
                                                            </h2>
                                                        </div>
                                                        <div id="collapse{{ $faq->id}}" class="panel-collapse collapse @if($index == 0) {{ 'in' }} @endif">
                                                            <div class="panel-body">
                                                                <p>{{ $faq->answer }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
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
        </div>

@include('partials.footer')


@push('script')
   <script type="text/javascript">

        $('#contact-form').bootstrapValidator({
            fields: {
                phone: {
                    validators: {
                        notEmpty: {
                            message: '* Талбарын утгыг бөглөнө үү'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: '* Талбарын утгыг бөглөнө үү'
                        },
                        emailAddress: {
                            message: '* И-мэйл хаяг биш байна.'
                        }
                    }
                },
                location: {
                    validators: {
                        notEmpty: {
                            message: '* Талбарын утгыг бөглөнө үү'
                        }
                    }
                },
                message: {
                    validators: {
                        notEmpty: {
                            message: '* Талбарын утгыг бөглөнө үү'
                        },
                        stringLength: {
                            max: 500,
                            message: '* Их тэмдэгт оруулсан байна.'
                        }
                    }
                }
            }
        });
            @if (session('contactstatus'))
        	$.notify({
            	icon: 'fa fa-check',
            	message: " {{ session('contactstatus') }}"

            },{
                type: 'success',
                timer: 1000
            });
           @endif
    </script>
@endpush