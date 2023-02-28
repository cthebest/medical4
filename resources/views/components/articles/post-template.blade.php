<div class="flex flex-col">
    <div class="bg-white rounded-lg overflow-hidden flex flex-col flex-1">
        <div class="flex flex-col md:flex-row">
            @if($image)
                <div class="md:w-1/2">
                    <img class="w-full object-cover object-center" src="{{Storage::url($image)}}" alt="Post Image">
                </div>
            @endif
            <div class="p-4">
                <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $title }}</h2>
                <p class="text-gray-600 leading-relaxed">{!! $description  !!}</p>
                <a href="{{$url}}" class="text-blue-500 font-bold mt-2">Leer más</a>
            </div>

        </div>
        <div class="flex flex-col md:flex-row items-center justify-between p-4 border-t border-gray-300 text-xs">
            <p class="text-gray-600">{{$author}}</p>
            <p class="text-gray-600">Última actualización: {{ $date }}</p>
        </div>
    </div>
</div>
