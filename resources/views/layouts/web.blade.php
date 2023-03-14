<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1″ />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Enoe Cruz Martínez') }}</title>
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text&display=swap" rel="stylesheet">
    @stack('styles')
    <script src="https://www.google.com/recaptcha/api.js?render=6LdyVygkAAAAANImiWdZA60--y-NzIfkF-SnhxMX"></script>
    <script>
        document.addEventListener('submit', function(e) {
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('6LdyVygkAAAAANImiWdZA60--y-NzIfkF-SnhxMX', {
                    action: 'submit'
                }).then(function(token) {
                    let form = e.target;
                    let input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'g-recaptcha-response';
                    input.value = token;
                    form.appendChild(input);
                    form.submit();
                });
            });
        });
    </script>
    @livewireStyles
</head>

<body>
    <div class="big_header">
        @livewire('menu')
        {{ $banner }}
    </div>
    <main>
        {{ $slot }}
    </main>


    @livewire('footer')
    @stack('scripts')
    @livewireScripts
</body>

</html>
