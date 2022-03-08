@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="form-signin" method="POST" action="{{ route('password.email') }}">
        @csrf
        <h2 class="form-signin-heading">{{ __('Reset Password') }}</h2>
        <div class="login-wrap">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="User ID">

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </div>
        <button class="btn btn-lg btn-login btn-block" type="submit">{{ __('Send Password Reset Link') }}</button>
        
    </form>
              
</div>
@endsection