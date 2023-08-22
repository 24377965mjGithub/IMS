@extends('layouts.app')

@section('content')
<div class="login bladeform">
    <div class="container">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <h2 class="poppins">Inventory Management System</h2>
                            <h4 class="poppins">Login</h4>

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
                                <label for="password" class="">{{ __('Password') }}</label>
    
                                <div class="">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="">
                                <div class="">
                                    <div class="">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="">
                                <div class="">
                                    <button type="submit" class="btn btn-primary form-control">
                                        <i class="fa fa-lock"></i> {{ __('Login') }}
                                    </button><br>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
    </div>
</div>
@endsection
