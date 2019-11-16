@extends('layouts.admin')

@section('title', 'Login')

@section('content')
    <div class="auth login">
        <h1 class="auth-title">{{ __('Login') }}</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-item @error('email') has-error @enderror">
                <label for="email" class="form-item-label">{{ __('E-Mail') }}</label>

                <input id="email" type="email" class="form-item-field" name="email" value="{{ old('email') }}" required
                       autocomplete="email" autofocus>

                @error('email')
                <span class="form-item-help" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-item @error('password') has-error @enderror">

                <label for="password" class="form-item-label">{{ __('Wachtwoord') }}</label>

                <input id="password" type="password" class="form-item-field" name="password" required
                       autocomplete="current-password">

                @error('password')
                <span class="form-item-help invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-item form-item-checkbox">
                <label class="form-item-label" for="remember">
                    {{ __('Onthoud mij') }}
                </label>
                <input class="form-item-field" type="checkbox" name="remember"
                       id="remember" {{ old('remember') ? 'checked' : '' }}>
            </div>

            <button type="submit" class="btn">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Wachtwoord vergeten?') }}
                </a>
            @endif
        </form>
    </div>
@endsection
