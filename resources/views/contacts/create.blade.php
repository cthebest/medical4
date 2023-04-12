<x-web-layout>
    <x-slot:banner>
    </x-slot:banner>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="margin-top: 90px">
        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

        </div>

        <div>

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3734.0578568532974!2d-100.46401698542688!3d20.62649840676551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d35060a351bb49%3A0x27cf979beb4956d7!2sHospital%20Santo%20Tom%C3%A1s!5e0!3m2!1ses-419!2sco!4v1677625534600!5m2!1ses-419!2sco"
                frameborder="0" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                style="border:0; width: 100%; height: 350px;"></iframe>
        </div>

        <div class="container">

            <div class="row mt-5">

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Nuestra dirección</h3>
                                <p>Hospital Santo Tomás, Torre
                                    B, Consultorio B204 Prol. Blvd. Bernardo
                                    Quintana No.2906 Cerrito Colorado C.P. 76116 Santiago de Querétaro, Qro</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email de contacto</h3>
                                <p>enoecruzmtz@gmail.com<br>contacto@enoecruzneuro.com.mx</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Llámanos</h3>
                                <p>442 6822115</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    @if (Session::has('success'))
                        <div class="" id="message_show">
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
                    {!! Form::open(['route' => 'contacts.send', 'class' => 'php-email-form']) !!}
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Your Name" required="">
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Your Email" required="">
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="7" placeholder="Message" required=""></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Enviar mensaje</button></div>
                    {!! Form::close() !!}
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->




    <section class="space-y-4 mt-4">

    </section>
</x-web-layout>
