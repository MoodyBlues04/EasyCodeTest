<?php
/** @var \App\Models\UserSetting $setting */
?>

@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 30px; margin-bottom: 30px">
                <div class="card">
                    <div class="card-header">{{ __('Request setting update') }}</div>
                    <p>
                        You requested setting updation. Check chosen device for confirmation link
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

