@extends('layouts.main')

@section('content')


<form method="POST" class="container-add-account" action="{{ route('add-account') }}" enctype="multipart/form-data">
    @csrf
    <div class="image">
        <img class="image-item" id="preview-image-before-upload" src="{{ asset('images/default.jpeg') }}" alt="{{ Auth::user()->name}}">
        <div class="edit-item-container">
            <label for="image-upload">
                <i class="fas fa-pen fa-lg edit-item"></i>
            </label>
            <input id="image-upload" name="avatar" type="file" />
            @error('avatar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="forms">
        <div class="form-group-1">
            <div class="form-group first">
                <label for="userName">{{ __('Username') }}</label>

                <input id="userName" type="userName" class="form-control @error('userName') is-invalid @enderror" name="userName" value="{{ old('userName') }}" required autocomplete="userName" autofocus placeholder="Enter new username">

                @error('userName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group second">
                <label for="userType">{{ __('Usertype') }}</label>

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

                <div>
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

                <div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter confirm password">
                </div>
            </div>
        </div>
    </div>
    <div class="button">
        <button type="submit" class="btn btn-primary button-item">
            {{ __('Add Account') }}
        </button>
    </div>
</form>

@endsection