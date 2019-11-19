@extends('layouts.admin')

@section('title', 'Verificatie')

@section('content')
    <div class="auth verify">
        <h1 class="auth-title">{{ __('Bevestig je email adress') }}</h1>

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('Een nieuwe verificatie link is naar je email adres gestuurd.') }}
            </div>
        @endif

        <p>
            {{ __('Voordat je verder gaat, kijk of je een email hebt ontvangen met een verificatie link.') }}
            {{ __('Als je de email niet hebt ontvangen, kijk dan eens in je spambox of ') }},
            <form class="form-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit"
                        class="link">{{ __('klik hier om een nieuwe email te ontvangen') }}</button>
                .
            </form>
        </p>
    </div>
@endsection
