<x-web-layout>

    <x-slot:banner>
        @include('slider')
    </x-slot:banner>

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-md-6 col-lg-4  mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="fa-solid fa-mobile"></i></div>
                        <h4 class="title"><a href="">Citas y whatsapp</a></h4>
                        <p class="description">442 6822 115</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4  mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                        <h4 class="title"><a href="">Dirección</a></h4>
                        <p class="description">Hospital Santo Tomás, Torre B, Consultorio B204 Prol. Blvd. Bernardo
                            Quintana No.2906 Cerrito
                            Colorado C.P. 76116 Santiago de Querétaro, Qro</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4  mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                        <h4 class="title">Contáctenos</h4>
                        <p class="description">
                            ¿Tienes dudas?
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Featured Services Section -->

    <livewire:services></livewire:services>
    <livewire:articles-module></livewire:articles-module>
    <livewire:faq-module></livewire:faq-module>

    <section id="featured-services" class="w-100">

        <div class="w-100 d-flex justify-content-center">
            <video controls src="{{ asset('imgs/enoe.mp4') }}" autoplay class="w-25 h-25">
                Tu navegador no admite el elemento <code>video</code>.
            </video>
        </div>
    </section>

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Testimonios</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                risus at semper.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                alt="">
                            <h3>Anabel Taf Arell</h3>
                            <h4>Diseñadora</h4>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

</x-web-layout>
