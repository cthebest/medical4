<div class="container">
    @if ($articles && $articles->count() > 0)
        <h1>Nuestras últimas publicaciones</h1>
        <section class="content">
            @include('index-module')
        </section>
    @endif
</div>
