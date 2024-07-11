<?php
/**
 * @var \App\Models\UserSetting $setting
 * @var \App\View\Objects\DropdownItem[] $confirmationTypes
 */
?>

@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 30px; margin-bottom: 30px">
                <div class="card">
                    <div class="card-header">{{ __('Edit setting') }}</div>

                    <form method="POST" action="{{ route('user.settings.request_update', $setting) }}"
                          style="margin-bottom: 50px">
                        @csrf
                        @method('PATCH')
                        <x-input-text field="name" value="{{$setting->setting->name}}" readonly/>
                        <x-input-text field="value" value="{{$setting->value}}"/>
                        <x-input-dropdown field="confirmation_type" :items="$confirmationTypes"/>
                        <x-submit-button name="Create"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

