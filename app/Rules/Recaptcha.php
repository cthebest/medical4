<?php

namespace App\Rules;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => '6LdyVygkAAAAALMEtQ5m6niSPkDpFLQ2GXgyujTH',
                'response' => $value
            ]
        )->object();
        return $response->success && $response->score >= 0.7;
    }

    public function message()
    {
        return 'La verificación recaptcha falló';
    }
}
