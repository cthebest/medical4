@if ($articles)
    <!-- ======= Services Section ======= -->
    <section id="services" class="services services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Services</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat
                    sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                        @if ($article->image)
                            <div class="icon">
                                <img class="img-fluid" src="{{ Storage::url($article->image) }}"
                                    alt="{{ $article->alias }}">
                            </div>
                        @endif
                        <h4 class="title"><a href="{{ to_url($article) }}">{{ $article->title }}</a></h4>
                        <p class="description">{{ $article->description }}</p>
                        <a href="{{ to_url($article) }}">Leer más</a>
                    </div>
                @endforeach
            </div>
    </section><!-- End Services Section -->
@endif
