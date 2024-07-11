<?php
/** @var \App\Models\Setting[] $settings */
?>

@extends('layout')

@section('content')
    <section class="article">
        <div class="container">
            <h3>Settings</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Value</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($settings as $setting)
                    <tr>
                        <th scope="row">{{ $setting->id }}</th>
                        <td>{{ $setting->name }}</td>
                        <td>{{ $setting->description }}</td>
                        <td>{{ $setting->pivot->value ?? '_' }}</td>
                        <td>
                            <x-edit-button :model="$setting" routeName="user.settings.edit"/>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection


