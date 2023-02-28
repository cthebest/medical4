@php
    $menu_item = $menuItem ?? null;
    $menuItemOrders = $menuItemOrders??[];
@endphp

@livewire('alias-form', ['name_property' => 'title', 'name' => old('title', $menu_item?->title), 'alias' => old('alias', $menu_item?->alias)])
<x-adminlte-input label="{{ trans('adminlte::adminlte.icon') }}" name='icon' :value="old('icon', $menu_item?->icon)"/>
@if ($menuItemOrders)
    <x-adminlte-select label="Orden" name="order" placeholder="-- Seleccione un orden --">
        @foreach ($menuItemOrders as $key => $menuItemOrder)
            <option
                value="{{ $menuItemOrder->order }}" @selected($menuItemOrder->order === old('order', $menu_item?->order))>{{ $menuItemOrder->order }}</option>
        @endforeach
    </x-adminlte-select>
@endif
@livewire('menu-type-form', [
    'title' => $menu_item?->component_option->name,
    'field' => $menu_item?->component_option->livewire_field,
    'component_id' => $menu_item?->component_id,
    'component_option_id' => $menu_item?->component_option_id,
    'resource_id' => $menu_item?->resource_id,
])
<x-adminlte-button id="create-article" label="{{ trans('adminlte::adminlte.Save') }}" theme="primary" icon="fas fa-save"
                   type="submit"/>
