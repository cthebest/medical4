@php
    $article = $article ?? null;
    $statuses = [['id' => 'published', 'label' => 'Publicado'], ['id' => 'draft', 'label' => 'Borrador']];
@endphp
@livewire('alias-form', ['name_property' => 'title', 'name' => old('title', $article?->title), 'alias' => old('alias', $article?->alias)])
<x-adminlte-select label="{{ trans('adminlte::adminlte.categories') }}" name="category_id" id="category_id">
    <option value="0">--Seleccione una categoría--</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}" @selected($category->id === (int) old('category_id', $article?->category_id))>{{ $category->name }}</option>
    @endforeach
</x-adminlte-select>

<x-adminlte-select label="{{ trans('adminlte::adminlte.status') }}" name="status" id="status">
    <option value="0">--Seleccione un estado--</option>
    @foreach ($statuses as $status)
        <option value="{{ $status['id'] }}" @selected($status['id'] === old('status', $article?->status))>{{ $status['label'] }}</option>
    @endforeach
</x-adminlte-select>

@livewire('description', ['description' => old('description', $article?->description)])


<x-adminlte-text-editor name="body" label="{{ trans('adminlte::adminlte.body') }}">
    {{ old('body', $article?->body) }}
</x-adminlte-text-editor>

{{-- With label and feedback disabled --}}
<x-adminlte-input-file name="image" label="{{ trans('adminlte::adminlte.featured_image') }}"
    placeholder="Escoja una imágen principal" :legend="trans('adminlte::adminlte.browse')" disable-feedback>
    <x-slot name="prependSlot">
        <div class="input-group-text bg-lightblue">
            <i class="fas fa-upload"></i>
        </div>
    </x-slot>
    <x-slot name="bottomSlot" class="mt-1">
        <span class="text-primary">{{ $article?->image }}</span>
    </x-slot>
</x-adminlte-input-file>

@livewire('tag-form', ['selected_tags' => $article?->tags->toArray() ?? []])

<x-adminlte-button id="create-article" label="{{ trans('adminlte::adminlte.Save') }}" theme="primary"
    icon="fas fa-save" type="submit" />
