@push('styles')
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endpush
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="relative border flex flex-col justify-center">
                <img
                    class="object-fit w-full"
                    src="{{asset('imgs/banner1_070152.jpg')}}"
                    alt="image"
                />
                <div class="absolute px-4  w-1/2 space-y-2">
                    <h1 class="text-5xl text-cyan-900 font-extrabold">¿Necesitas ayuda con un integrante de tu
                        familia?</h1>
                    <p class="text-slate-400 font-semibold">No dudes en contactarnos</p>
                    <div>
                        <a href="#" class="p-2 bg-[#c7f768]">Reserva tu cita</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="relative border flex flex-col justify-center">
                <img
                    class="object-fit w-full"
                    src="{{asset('imgs/banner2_050914.png')}}"
                    alt="image"
                />
                <div class="absolute px-4  w-1/2 space-y-2">
                    <h1 class="text-5xl text-cyan-900 font-extrabold">Encefalograma digital, Mapeo cerebral, Potenciales
                        Visuales y Auditivos.
                        Si hacemos estudios! 15% descuento
                    </h1>
                    <p class="text-slate-400 font-semibold">Vigencia: hasta JUNIO 2023
                    </p>
                    <div>
                        <a href="#" class="p-2 bg-[#c7f768]">Reserva tu cita</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="relative border flex flex-col justify-center">
                <img
                    class="object-fit w-full"
                    src="{{asset('imgs/banner3_050856.png')}}"
                    alt="image"
                />

                <div class="absolute px-4  w-1/2 space-y-2">
                    <h1 class="text-5xl text-cyan-900 font-extrabold">Ante una crisis, lo mejor es estar informado,
                        resolveremos tus dudas...</h1>
                    <p class="text-slate-400 font-semibold">No dudes en contactarnos</p>
                    <div>
                        <a href="#" class="p-2 bg-[#c7f768]">Reserva tu cita</a>
                    </div>
                </div>
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
