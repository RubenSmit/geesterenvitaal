@extends('layouts.admin')

@section('title', 'Registreren')

@section('content')
    <div class="auth register">
        <h1 class="auth-title">{{ __('Registreren') }}</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-item @error('name') has-error @enderror">
                <label for="name" class="form-item-label">{{ __('Naam') }}</label>

                <input id="name" type="text" class="form-item-field" name="name" value="{{ old('name') }}" required
                       autocomplete="name" autofocus>

                @error('name')
                <span class="form-item-help" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-item @error('email') has-error @enderror">
                <label for="email" class="form-item-label">{{ __('E-Mail') }}</label>

                <input id="email" type="email" class="form-item-field" name="email" value="{{ old('email') }}" required
                       autocomplete="email">

                @error('email')
                <span class="form-item-help" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-item @error('password') has-error @enderror">
                <label for="password" class="form-item-label">{{ __('Wachtwoord') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-item-field" name="password" required
                           autocomplete="new-password">

                    @error('password')
                    <span class="form-item-help" role="alert">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-item @error('password-confirm') has-error @enderror">
                <label for="password-confirm" class="form-item-label">{{ __('Bevestig wachtwoord') }}</label>

                <input id="password-confirm" type="password" class="form-item-field" name="password_confirmation"
                       required autocomplete="new-password">
            </div>

            <button type="submit" class="btn">
                {{ __('Registreren') }}
            </button>
        </form>
    </div>
@endsection
