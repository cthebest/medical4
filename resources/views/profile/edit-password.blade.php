@extends('adminlte::page')

@section('title', 'profile')

@section('content_header')
<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <div class="max-w-xl">
        @include('profile.partials.update-password-form')
    </div>
</div>

@stop
