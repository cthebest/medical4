<x-web-layout>
    <x-slot:banner>
        <div class="relative flex items-center">
            <img src="{{asset('imgs/contact-us-1908763_1920.png')}}" alt="" class="h-40 w-full object-cover">

            <div class="bg-blue-900 h-full absolute top-0 right-0 left-0 opacity-40">
            </div>

            <span class="z-50 text-6xl absolute text-white font-extrabold px-10">Contáctenos</span>

        </div>
    </x-slot:banner>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-gray-100 p-4">
            <ul class="mb-4">
                <li class="flex items-center mb-2">
                    <i class="fas fa-map-marker-alt text-gray-500 mr-2"></i>
                    <span>Dirección: Hospital Santo Tomás, Torre
                    B, Consultorio B204 Prol. Blvd. Bernardo
                    Quintana No.2906 Cerrito Colorado C.P. 76116 Santiago de Querétaro, Qro</span>
                </li>
                <li class="flex items-center mb-2">
                    <i class="fas fa-phone-alt text-gray-500 mr-2"></i>
                    <span>Teléfono: 442 6822115</span>
                </li>
                <li class="flex items-center">
                    <i class="fas fa-envelope text-gray-500 mr-2"></i>
                    <span>Correo electrónico: enoecruzmtz@gmail.com</span>
                </li>
            </ul>
        </div>
        <div class="p-4">
            <h2 class="text-2xl font-bold mb-4">Formulario de contacto</h2>
            @if (Session::has('success'))
                <div class="bg-green-200 mt-2 border border-green-200 rounded text-green-700 p-2 font-bold w-full mb-2"
                     id="message_show">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if ($errors->count() > 0)
                <div class="bg-red-200 mt-2 border border-red-200 rounded text-red-700 p-2 font-bold w-full">
                    Corrige los siguientes errores
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(['route' => 'contacts.send', 'class'=>'space-y-4']) !!}
            <div>
                <label class="block font-bold text-gray-700">Nombre completo</label>
                <input type="text" name="name"
                       class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block font-bold text-gray-700">Correo electrónico</label>
                <input type="email" name="email"
                       class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block font-bold text-gray-700">Mensaje</label>
                <textarea name="message"
                          class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>
            <button type="submit" class="bg-blue-400 hover:bg-blue-600 text-white py-2 px-4 rounded">Enviar
                mensaje
            </button>
            {!! Form::close() !!}
        </div>
    </div>


    <section class="space-y-4">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d120689.12363162886!2d-98.26300596649035!3d19.04019627469931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sco!4v1673910984785!5m2!1ses-419!2sco"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="w-full"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
</x-web-layout>
