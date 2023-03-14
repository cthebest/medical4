<footer>
    <section>
        <h1>Enoe Cruz Martínez</h1>
        <i class="fa-solid fa-mobile"></i><span>442 6822 115</span>
        <div>
            <i class="fa-solid fa-location-dot"></i>
            Hospital Santo Tomás, Torre B, Consultorio B204 Prol. Blvd. Bernardo Quintana No.2906 Cerrito Colorado
            C.P. 76116 Santiago de Querétaro, Qro
        </div>
    </section>
    <section>
        <h1>Navegación</h1>
        <ul>
            @foreach ($menuItems as $menuItem)
                <li>
                    <a href="{{ url($menuItem->path) }}">
                        {{ $menuItem->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
    <section class="social">
        <h1>Síguenos</h1>
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-twitter"></i>
    </section>
    <div class="developer-info">
        <span>2023 Enoe Cruz Martínez. Todos los derechos reservados</span>
        <span>Diseñado por Anabel y Edgar Andrey Vega Paredes</span>
    </div>

</footer>
