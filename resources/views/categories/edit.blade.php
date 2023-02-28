@extends('adminlte::page')
@section('title','Categorías')
@section('content_header')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <h1>Actualizar una categoría</h1>
                @if(session('success'))
                    <x-adminlte-alert theme="success" title="Success">
                        {{session('success')}}
                    </x-adminlte-alert>
                @endif
                <form action="{{route('categories.update', $category->id )}}" method="POST">
                    @method('PUT')
                    @csrf
                    @include('categories.partials.inputs')
                </form>
            </div>
        </div>
    </div>
@stop
