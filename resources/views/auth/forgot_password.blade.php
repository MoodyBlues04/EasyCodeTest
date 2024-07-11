@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 30px; margin-bottom: 30px">
                <div class="card">
                    <div class="card-header">{{ __('Password recover') }}</div>

                    <div class="card-body">
                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <x-input-text field="email" type="email" placeholder="Введите вашу почту"/>
                            <x-submit-button name="Восстановить"/>
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
