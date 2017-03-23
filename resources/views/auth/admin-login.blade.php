@extends('layouts.app')

<div class="container">
    <div class="section section-signin">
        <div class="form-container">
            <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 text-center">
                <div class="title-area">
                    <h2>АЗХ админ</h2>
                    <div class="separator separator-danger">✻</div>
                </div>
                 <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
                         {{ csrf_field() }}
                        <label><h4 class="text-gray">Таны и-мэйл хаяг:</h4></label>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="MichaelJordan@gmail.com" class="form-control form-control-plain">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span> 
                             @endif
                        </div>

                        <label><h4 class="text-gray">Таны нууц үг: </h4></label>
                        <div  class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" name="password" required placeholder="●●●●" class="form-control form-control-plain">
                             @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span> 
                             @endif
                        </div>

                        <div class="footer">
                            <button type="submit" class="btn btn-blue btn-round btn-fill btn-wd">
                                        Нэвтрэх
                            </button>
                        </div>
                 </form>
            </div>
        </div>
    </div>
</div>