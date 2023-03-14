<x-web-layout>
    <x-slot:banner></x-slot:banner>
    <div>
        @include('index-module')
        {{ $articles->links() }}
    </div>
</x-web-layout>
