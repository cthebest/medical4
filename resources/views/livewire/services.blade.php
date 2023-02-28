<div class="mt-10">
    @if ($articles && $articles->count() > 0)
        <section data-aos="fade-up" data-aos-duration="3000">
            <div class="container mx-auto space-y-4">
                <h1 class="text-cyan-900 text-4xl px-4 text-center">¡Acércate a nosotros para informarte,
                    descubrir un
                    posible
                    trastorno o problema neurólogico, es importante realizar un estudio a fondo!</h1>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 sm:grid-cols-1 py-10 gap-2 w-5/6  container mx-auto">
                    @foreach($articles as $article)
                        <div class="flex flex-col items-center">
                            <img src="{{Storage::url($article->image)}}" alt="{{$article->alias}}"
                                 class="w-32 rounded-full">
                            <h1 class="text-lg text-cyan-900 font-bold text-center  uppercase">{{$article->title}}</h1>
                            <p class="text-center">{!! Str::limit($article->description, 120) !!}</p>
                            <a href="{{to_url($article)}}" class="text-blue-600 font-bold">Leer más</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</div>
