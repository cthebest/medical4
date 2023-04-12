@php
    $banner = $banner ?? null;
@endphp
{{-- With label and feedback disabled --}}
<x-adminlte-input-file name="image" label="{{ trans('adminlte::adminlte.featured_image') }}"
    placeholder="Escoja una imágen" :legend="trans('adminlte::adminlte.browse')" disable-feedback>
    <x-slot name="prependSlot">
        <div class="input-group-text bg-lightblue">
            <i class="fas fa-upload"></i>
        </div>
    </x-slot>
    <x-slot name="bottomSlot" class="mt-1">
        @if ($errors->first('image'))
            <span class="text-danger">{{ $errors->first('image') }}</span>
        @endif
        <span class="text-primary">{{ $banner?->image }}</span>
    </x-slot>
</x-adminlte-input-file>

@livewire('description', ['description' => old('description', $banner?->description)])

<x-adminlte-select label="{{ trans('adminlte::adminlte.status') }}" name="published" id="published">
    <option value="0" @selected(0 == old('published', $banner?->published))>No publicado</option>
    <option value="1" @selected(1 == old('published', $banner?->published))>Publicado</option>
</x-adminlte-select>

<x-adminlte-button id="create-category" label="{{ trans('adminlte::adminlte.Save') }}" theme="primary"
    icon="fas fa-save" type="submit" />
