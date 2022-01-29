@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="headline authTitle">{{ __('Register') }}</div>

    <form class="form" method="POST" action="{{ route('register') }}">
        @csrf
    
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
            <p class="formError">{{ $message }}</p>
        @enderror
                            
                        

                        
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
                <p class="formError">{{ $message }}</p>
        @enderror
                            
                        

                        
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
                <p class="formError">{{ $message }}</p>
        @enderror
                           
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>                    
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        
        <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
        </button>
                        
    </form>
               
</div>
@endsection
