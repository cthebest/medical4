@extends('adminlte::page')
@section('title', 'Preguntas frecuentes')
@section('content_header')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <h1>Banners</h1>
                @can('create', \App\Models\Banner::class)
                    <a href="{{ route('banners.create') }}" class="btn btn-primary mb-3 mt-3">
                        <i class="fas fa-plus"></i> Nuevo
                    </a>
                @endcan
                @livewire('banner-table')
            </div>
        </div>
    </div>
@stop
