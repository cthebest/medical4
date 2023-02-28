<x-web-layout>
    <x-slot:banner></x-slot:banner>
    <div class="p-4">
        @include('index-module')
        {{ $articles->links() }}
    </div>
</x-web-layout>
