@extends('layouts.admin')

@section('title', 'Wachtwoord resetten')

@section('content')
    <div class="auth reset">

        <div class="auth-title">{{ __('Wachtwoord resetten') }}</div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-item @error('email') has-error @enderror">
                <label for="email" class="form-item-label">{{ __('E-Mail') }}</label>

                <input id="email" type="email" class="form-item-field" name="email" value="{{ $email ?? old('email') }}"
                       required autocomplete="email" autofocus>

                @error('email')
                <span class="form-item-help" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-item @error('password') has-error @enderror">
                <label for="password" class="form-item-label">{{ __('Wachtwoord') }}</label>

                <input id="password" type="password" class="form-item-field" name="password" required
                       autocomplete="new-password">

                @error('wachtwoord')
                <span class="form-item-help" role="alert">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-item">
                <label for="password-confirm" class="form-item-label">{{ __('Bevestig wachtwoord') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-item-field" name="password_confirmation"
                           required autocomplete="new-password">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                {{ __('Reset wachtwoord') }}
            </button>
        </form>
    </div>
@endsection
