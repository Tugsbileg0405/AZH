@extends('layouts.app')

@include('partials.navbarNoTrans')

@section('content')
 <div class="section section-login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                    <div class="panel-heading">
                        <h3>
                            Нэвтрэх
                        </h3>
                    </div>
                    <div class="panel-body" style="border:none">
                        <form class="form-group" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Таны цахим шуудан</label>
                                <input id="email" type="email" class="form-control" placeholder="Цахим шуудангийн хаягаа оруулана уу" name="email" value="{{ old('email') }}" required autofocus>
                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> 
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Таны нууц үг</label>
                                <input id="password" type="password" placeholder="Цахим шуудангийн хаягаа оруулана уу" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> 
                                 @endif
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6" style="line-height:40px">
                                        <a href="{{ route('password.request') }}">
                                            Нууц үгээ мартсан?
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:right">
                                        <button type="submit" class="btn btn-primary">
                                            Нэвтрэх
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

@endsection