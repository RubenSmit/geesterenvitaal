@extends('layouts.admin')

@section('title', 'Wachtwoord resetten')

@section('content')
    <div class="auth email">

        <h1 class="auth-title">{{ __('Wachtwoord resetten') }}</h1>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-item @error('email') has-error @enderror">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="form-item-field" name="email" value="{{ old('email') }}" required
                       autocomplete="email" autofocus>

                @error('email')
                <span class="form-item-help" role="alert">{{ $message }}</span>
                @enderror
            </div>


            <button type="submit" class="btn">
                {{ __('Verstuur wachtwoord reset link') }}
            </button>
        </form>
    </div>
@endsection
