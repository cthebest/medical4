@extends('adminlte::page')
@section('title', 'Artículos')
@section('plugins.Summernote', true)
@section('plugins.BsCustomFileInput', true)
@section('content_header')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <h1>Editar ítem de menú</h1>
                @if (session('success'))
                    <x-adminlte-alert theme="success" title="Success">
                        {{ session('success') }}
                    </x-adminlte-alert>
                @endif
                <form action="{{ route('menu-items.update', $menuItem->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('menu_items.partials.inputs')
                </form>
            </div>
        </div>
    </div>
@stop
