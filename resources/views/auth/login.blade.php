@extends('layouts.app')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div> 
                <div class="panel-body">
                    @if ($errors->has('email') || $errors->has('password'))
                        <div class="alert alert-danger">
                            <h4>Username / Password yang Anda masukkan Salah</h4>
                            <p>Silahkan cek kembali</p>
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        {{-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> --}}
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus oninvalid="this.setCustomValidity('Username tidak boleh kosong / Penulisan Email Salah')" oninput="setCustomValidity('')">

                                {{-- @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        {{-- <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> --}}
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')">

                                {{-- @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
