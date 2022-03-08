@extends('layouts.app')

@section('content')
<div class="container">
    <form class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <h2 class="form-signin-heading">{{ __('Reset Password') }}</h2>
        <div class="login-wrap">
            <input id="email" type="email" placeholder="User Id"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus style="margin-bottom: 10px;">
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
            <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required style="margin-bottom: 10px;"> 
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif

            <input id="password-confirm" placeholder="{{ __('Confirm Password') }}" type="password" class="form-control" name="password_confirmation" required>

            <button type="submit" class="btn btn-primary">
            {{ __('Reset Password') }}
            </button>
        </div>
</form>
               
</div>
@endsection