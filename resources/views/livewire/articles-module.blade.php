<div class="mt-10">
    @if($articles && $articles->count()>0)
        <section data-aos="fade-up" data-aos-duration="2000">
            <div class="container mx-auto py-10 space-y-4">
                <h1 class="text-cyan-900 text-4xl text-center">Nuestras últimas publicaciones</h1>
                @include('index-module')
            </div>
        </section>
    @endif
</div>
