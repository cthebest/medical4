<div class="container">
    <section class="services">

        <img src="{{ asset('imgs/doctor1.jpg') }}" alt="" />
        <div class="specialist-info">
            <h2>Dra. Enoe Cruz Martínez.</h2>
            <span>Título Universitario</span>
            <p>¡Acércate a nosotros para informarte y descubrir un posible trastorno o problema neurólogico, es
                importante realizar un estudio a fondo!</p>
            <div class="services-info">
                @foreach ($articles as $article)
                    <div class="cart">
                        <img src="{{ Storage::url($article->image) }}" alt="{{ $article->alias }}" />
                        <div>
                            <h3>{{ $article->title }}</h3>
                            <p>{{ $article->description }}</p>
                            <a href="{{ to_url($article) }}">Leer más</a>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>
</div>
