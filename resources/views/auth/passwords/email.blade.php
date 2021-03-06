@extends('layouts.app')

@include('partials.navbarNoTrans')

@section('content')
 <div class="section section-login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                    <div class="panel-heading">
                        <h3>
                            Нууц үг шинэчлэх
                        </h3>
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-group" role="form" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">Таны цахим шуудан</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                 <button type="submit" class="btn btn-primary">
                                     Нууц үг шинэчлэх холбоос илгээх
                                 </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection