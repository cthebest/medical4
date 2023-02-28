@php
    $category = $category??null;
@endphp

@livewire('alias-form', ['name_property' => 'name', 'name' => $category?->name, 'alias'=>$category?->alias])
<x-adminlte-input name="description" label="{{trans('adminlte::adminlte.description') }}"
                  :value="$category?->description"></x-adminlte-input>
<x-adminlte-button id="create-category" label="{{trans('adminlte::adminlte.Save') }}" theme="primary"
                   icon="fas fa-save"
                   type="submit"/>
