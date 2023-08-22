@extends('layouts.app')

@section('content')
<div class="email bladeform">
    <div class="container">
    <div class="">
        @if (session('status'))
            <div class="" role="alert">
                <p class="alert alert-success">{{ session('status') }}</p>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <h2 class="poppins">Inventory Management System</h2>
            <h4 class="poppins">Please input your email to reset your password</h4>

            <div class="">
                <label for="email" class="">{{ __('Email Address') }}</label>

                <div class="">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="">
                <div class="">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
