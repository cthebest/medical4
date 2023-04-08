<x-web-layout>
    <x-slot:banner>
        hola
    </x-slot:banner>
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about" style="margin-top: 90px">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-4" data-aos="fade-right">
                    <img src="{{ Storage::url($article->image) }}" class="img-fluid" alt="{{ $article->alias }}">
                    <p class="fst-italic">Por {{ $article->user->name }}</p>
                    <p class="fst-italic">Actualizado: {{ $article->updated_at->diffForHumans() }}</p>
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3>{{ $article->title }}</h3>
                    <p class="fst-italic">
                        {{ $article->description }}
                    </p>
                    {!! $article->body !!}
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->
</x-web-layout>
