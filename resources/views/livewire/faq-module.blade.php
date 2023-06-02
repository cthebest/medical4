@if($faqs && $faqs->count()>0)
<!-- ======= Frequently Asked Questioins Section ======= -->
<section id="faq" class="faq section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Preguntas frecuentes</h2>
            <p>Respuestas a tus dudas comunes. Soluciones rápidas y precisas. Simplifica tu vida con nuestras FAQ..</p>
        </div>

        <ul class="faq-list">
            @foreach ($faqs as $faq)
                <li>
                    <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">
                        ¿{{ $faq->question }}?
                        <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                    </div>
                    <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            {{ $faq->answer }}
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>
</section><!-- End Frequently Asked Questioins Section -->
@endif
