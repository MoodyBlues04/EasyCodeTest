<?php
/** @var string $token */
?>
@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 30px; margin-bottom: 30px">
                <div class="card">
                    <div class="card-header">{{ __('Новый пароль') }}</div>

                    <div class="card-body">
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <x-input-email name="email" placeholder="Введите вашу почту"/>
                            <x-input-password name="password" placeholder="Придумайте пароль"/>
                            <x-input-password name="password_confirmation" placeholder="Повторите пароль"/>
                            <input type="hidden" name="token" value="{{$token}}" required>
                            <x-submit-button name="Восстановить"/>
                            <div class="row mt-4 mb-3 justify-content-center">
                                <div class="col-md-6">
                                    <a href="/">Log in</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
