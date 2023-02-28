<x-web-layout>
    @push('styles')
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @endpush
    <x-slot:banner>
        @include('slider')
    </x-slot:banner>
    <section class="p-4  z-50 relative w-5/6 container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white shadow rounded-md py-8 px-6 border">
                <div class="text-cyan-900">
                    <i class="fa-solid fa-blender-phone text-4xl"></i>
                    <h2 class="text-gray-400">Citas y Whatsapp</h2>
                    <span class="font-bold text-xl">442 6822115</span>
                </div>
            </div>
            <div class="bg-white shadow rounded-md py-8 px-6 border">
                <div class="text-cyan-900">
                    <i class="fa-solid fa-location-dot text-4xl"></i>
                    <h2 class="text-gray-400">¿En dónde nos encontramos?</h2>
                    <span class="font-bold text-xl">Dirección</span>
                </div>
                <p class="text-gray-400"> Hospital Santo Tomás, Torre B, Consultorio B204 Prol. Blvd.
                    Bernardo Quintana No.2906 Cerrito
                    Colorado C.P. 76116 Santiago de Querétaro, Qro</p>
            </div>
            <div class="bg-white shadow rounded-md py-8 px-6 border space-y-2">
                <div class="text-cyan-900">
                    <i class="fa-solid fa-envelope text-4xl"></i>
                    <h2 class="text-gray-400">¿Tienes dudas?</h2>
                    <span class="font-bold text-xl">Contactar con nosotros</span>
                </div>
                <div>
                    <a href="{{url('contactenos')}}" class="p-2 bg-[#c7f768] rounded-md">Contactar</a>
                </div>
            </div>

        </div>
    </section>

    <livewire:services></livewire:services>
    <livewire:articles-module></livewire:articles-module>

    @push('scripts')
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    @endpush
</x-web-layout>
