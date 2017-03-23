@extends('layouts.app')

@include('partials.navbarNoTrans')

 <div class="section section-newspage">
        <div class="container">
            <div class="row">
                    <div class="section section-faq">
                        <div class="container">
                            <div class="header-faq text-center">
                                <h2>Хөтөлбөрүүд</h2>
                                <div class="separator separator-danger">✻</div>
                            </div>
                            <div class="row">
                                @foreach($programNames as $index => $programName)
                                <div class="col-sm-6">
                                    <div class="box">
                                        <a href="{{ url('programs', $programName->id) }}">
                                        <h3 class="title-description">{{$index + 1}}. {{ $programName->name }}</h3>
                                        </a>
                                        <p class="text-description text-gray">{{ $programName->description }}</p>
                                         <a class="btn btn-gray" href="{{ url('programs', $programName->id) }}">Дэлгэрэнгүй унших
                                            <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

@include('partials.footer')