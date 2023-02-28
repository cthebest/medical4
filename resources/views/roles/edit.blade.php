@extends('adminlte::page')
@section('title', 'Roles')
@section('content_header')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @if (session('success'))
                    <x-adminlte-alert theme="success" title="Success">
                        {{ session('success') }}
                    </x-adminlte-alert>
                @endif
                <form method="POST" action="{{ route('roles.update', $role->id) }}">
                    @method('PUT')
                    @csrf
                    @include('roles.partials.inputs')

                    <div class="flex items-center justify-end mt-4">
                        <x-adminlte-button id="create-category" label="{{ trans('adminlte::adminlte.Save') }}" theme="primary"
                            icon="fas fa-save" type="submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
