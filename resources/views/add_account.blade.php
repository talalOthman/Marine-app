@extends('layouts.main')

@section('content')
<div class="container-add-account">

    <div class="image">
        <img class="image-item" src="{{ asset('images/default.jpeg') }}" alt="{{ Auth::user()->name}}">
        <a href="" class="edit-item"><i class="fas fa-pen fa-lg"></i></a>
    </div>

    <form class="forms" method="POST">
        @csrf
        <div class="form-group-1">
            <div class="form-group first">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter new email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group second">
                <label for="userType">{{ __('User Type') }}</label>

                <select name="userType" id="userType" class="form-control" required>
                    <option value="" disabled selected hidden>Select Usertype</option>
                    <option value="admin">Admin</option>
                    <option value="student">Student</option>
                    <option value="public">Public</option>
                </select>

                @error('userType')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group-2">
            <div class="form-group first">
                <label for="password">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter new password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group second">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter confirm password">
                </div>
            </div>
        </div>
    </form>

    <div class="button">
        <button type="submit" class="btn btn-primary button-item">
            {{ __('Add Account') }}
        </button>
    </div>


</div>
@endsection