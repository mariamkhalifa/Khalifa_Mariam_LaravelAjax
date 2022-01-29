@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="headline authTitle">{{ __('Login') }}</div>
    
    <form class="form" method="POST" action="{{ route('login') }}">
        @csrf
        
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <p class="formError">{{ $message }}
                @enderror
            
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <p class="formError">{{ $message }}</p>
            @enderror
        
        <div id="remember" class="formGroup">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
                
           
        <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
            <a id="forgotPass" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
           
    </form>
                
            
</div>
@endsection
