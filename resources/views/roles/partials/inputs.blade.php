@php
    $role = $role ?? null;
@endphp

<x-adminlte-input name="name" label="{{ trans('adminlte::adminlte.name') }}" value="{{ old('name', $role?->name) }}">
</x-adminlte-input>

@foreach ($permissions as $key => $permission)
    @php
        $permission_role = $role?->permissions->where('id', $permission->id)->first();
        $permission_value = (int) old("permission_ids.$key", $permission_role?->id);
        $checked = false;
        if ($permission_value === $permission->id) {
            $checked = true;
        }
    @endphp
    <div class="form-check">

        <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" id="flexCheckDefault"
            name="permission_ids[]" {{ $checked ? 'checked' : '' }}>
        <label class="form-check-label" for="flexCheckDefault">
            {{ __('adminlte::adminlte.' . $permission->name) }}
        </label>
    </div>
@endforeach
