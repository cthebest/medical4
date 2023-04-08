@if ($articles && $articles->count() > 0)
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">
            <div class="row no-gutters">
                @foreach ($articles as $article)
                    <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            @if ($article->image && !Storage::exists($article->image))
                                <img src="{{ Storage::url($article->image) }}" class="img-fluid" alt="">
                            @endif
                            <h2>{{ $article->title }}</h2>

                            {{ $article->description }}
                            <a href="{{ to_url($article) }}">Leer más &raquo;</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Counts Section -->

@endif
