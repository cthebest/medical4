@php
    $image = $article->image?Storage::url($article->image):asset('imgs/articles.jpg');
@endphp
<x-web-layout>
    <x-slot:banner>
        <div class="relative h-40 flex items-center">
            <img src="{{$image}}" alt=""
                 class="h-40 object-cover {{$article->image?'absolute right-0':'w-full'}}">
            <div class="bg-blue-900 h-full absolute top-0 right-0 left-0 opacity-40">
            </div>

            <span class="z-50 text-6xl absolute text-white font-extrabold px-10">{{$article->title}}</span>

        </div>
    </x-slot:banner>
    <div class="p-10">
        {!! $article->description !!}
    </div>
</x-web-layout>
