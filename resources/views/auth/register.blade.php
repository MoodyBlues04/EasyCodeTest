@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 30px; margin-bottom: 30px">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form action="{{ route('auth.register') }}" method="POST">
                            @csrf
                            <x-input-text field="name" type="text" placeholder="Введите ваше имя"/>
                            <x-input-email field="email" placeholder="Введите вашу почту"/>
                            <x-input-text field="phone" type="tel" placeholder="Введите ваш телефон"/>
                            <x-input-text field="tg" type="text" placeholder="Введите ваш tg ник"/>
                            <x-input-password field="password" placeholder="Придумайте пароль"/>
                            <x-input-password field="password_confirmation" placeholder="Повторите пароль"/>
                            <x-submit-button name="Регистрация"/>
                            <div class="row mt-4 mb-3 justify-content-center">
                                <div class="col-md-6">
                                    <a href="{{ route('auth.login') }}">Log in</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
