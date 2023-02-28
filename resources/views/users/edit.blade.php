@extends('adminlte::page')
@section('title', 'Usuarios')
@section('content_header')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @if (session('success'))
                    <x-adminlte-alert theme="success" title="Success">
                        {{ session('success') }}
                    </x-adminlte-alert>
                @endif
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @method('PUT')
                    @csrf
                    <x-adminlte-input name="name" label="{{ trans('adminlte::adminlte.name') }}" :value="old('name', $user->name)">
                    </x-adminlte-input>
                    <x-adminlte-input name="email" label="{{ trans('adminlte::adminlte.email') }}" :value="old('email', $user->email)">
                    </x-adminlte-input>

                    <x-adminlte-select label="{{ trans('adminlte::adminlte.roles') }}" name="role_id" id="role_id">
                        <option value="0">--Seleccione un rol--</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @selected($role->id === (int) old('role_id', $user->roles()->first()?->id))>{{ $role->name }}</option>
                        @endforeach
                    </x-adminlte-select>

                    <div class="flex items-center justify-end mt-4">
                        <x-adminlte-button id="create-category" label="{{ trans('adminlte::adminlte.Save') }}"
                            theme="primary" icon="fas fa-save" type="submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
