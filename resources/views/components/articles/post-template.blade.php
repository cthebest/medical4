<article>
    @if (!Storage::exists($image))
        <img src="{{ Storage::url($image) }}" alt="">
    @endif
    <div>
        <span>{{ $category->name }}</span>
        <span>{{ $date }}</span>
    </div>
    <h3>{{ $title }}</h3>
    <p>{{ $description }}</p>
    <a href="{{ $url }}">Leer más</a>
</article>
