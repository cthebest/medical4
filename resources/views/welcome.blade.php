<x-web-layout>

    <x-slot:banner>
        @include('slider')
    </x-slot:banner>
    <section class="info">
        <div class="cart">
            <div class="icon"> <i class="fa-solid fa-mobile"></i> </div>
            <div class="text">
                <h1>Citas y whatsapp</h1>
                <p>442 6822 115</p>
            </div>
        </div>
        <div class="cart">
            <div class="icon"> <i class="fa-solid fa-location-dot"></i> </div>
            <div class="text">
                <h1>Dirección</h1>
                <p>Hospital Santo Tomás, Torre B, Consultorio B204 Prol. Blvd. Bernardo Quintana No.2906 Cerrito
                    Colorado C.P. 76116 Santiago de Querétaro, Qro</p>
            </div>
        </div>
        <div class="cart">
            <div class="icon"> <i class="fa-solid fa-envelope"></i> </div>
            <div class="text">
                <h1>Contáctenos</h1>
                <p>¿Tienes dudas?</p>
                <input name="button2" type="button" class="btn btn-secondary" value="Reservar cita">
            </div>
        </div>
    </section>

    <livewire:services></livewire:services>
    <livewire:articles-module></livewire:articles-module>

</x-web-layout>
