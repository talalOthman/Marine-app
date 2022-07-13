@extends('layouts.login')

@section('content')

<div class="main-container">
    <div class="image-container"> <img class="responsive" src="{{URL::asset('/images/ship.png')}}"></div>

    <div class="login-container">
        <div class="login-title-container">
            <h3 class="login-title">Login to your account</h3>
            <p >To understand your vessel data in depth</p>
        </div>
        <div class="login-form-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group first">
                    <label for="userName">{{ __('Username') }}</label>

                    <input id="userName" type="text" class="form-control @error('userName') is-invalid @enderror" name="userName" value="{{ old('userName') }}" required autocomplete="userName" autofocus placeholder="Enter your username">

                    @error('userName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group second">
                    <label for="password">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary login-btn">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection