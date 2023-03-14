@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endpush
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="slider">
                <img src="{{ asset('imgs/banner1_070152.jpg') }}" alt="image1" class="slider-image" />
                <section class="promotion">
                    <p>¿Necesitas ayuda con un integrante de tu familia? No dudes en contactarnos</p>
                    <a href="#" class="btn btn-secondary">Reservar cita</a>
                </section>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="slider">
                <img src="{{ asset('imgs/banner2_050914.png') }}" alt="image2" class="slider-image" />
                <section class="promotion">
                    <p>Encefalograma digital, Mapeo cerebral, Potenciales
                        Visuales y Auditivos.
                        Si hacemos estudios! 15% descuento. Vigencia: hasta JUNIO 2023</p>
                    <a href="#" class="btn btn-secondary">Reservar cita</a>
                </section>
            </div>

        </div>
        <div class="swiper-slide">
            <div class="slider">
                <img src="{{ asset('imgs/banner3_050856.png') }}" alt="image3" class="slider-image" />
                <section class="promotion">
                    <p>Ante una crisis, lo mejor es estar informado,
                        resolveremos tus dudas</p>
                    <a href="#" class="btn btn-secondary">Reservar cita</a>
                </section>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        var swiper = new Swiper(".mySwiper", {
            cssMode: true,
            loop: true,
            autoplay: true,
            mousewheel: true,
            keyboard: true,
        });
    </script>
@endpush
