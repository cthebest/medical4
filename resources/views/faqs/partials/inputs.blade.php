@php
    $faq = $faq ?? null;
@endphp

<x-adminlte-input name="question" label="{{ trans('adminlte::adminlte.question') }}" :value="$faq?->question">
</x-adminlte-input>
<x-adminlte-input name="answer" label="{{ trans('adminlte::adminlte.answer') }}" :value="$faq?->answer">
</x-adminlte-input>
<x-adminlte-button id="create-category" label="{{ trans('adminlte::adminlte.Save') }}" theme="primary"
    icon="fas fa-save" type="submit" />
