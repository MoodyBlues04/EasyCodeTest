@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form action="{{ route('auth.login') }}" method="POST">
                            @csrf
                            <x-input-email field="email" placeholder="Введите вашу почту"/>
                            <x-input-password field="password" placeholder="Введите пароль"/>
                            <x-submit-button name="Войти"/>
                            <div class="row mt-4 mb-3 justify-content-center">
                                <div class="col-md-6">
                                    <a href="{{ route('auth.register_page') }}"
                                       style="margin-right: 30px">Sign up</a>
                                    <a href="{{ route('password.request') }}">Forgot password</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
