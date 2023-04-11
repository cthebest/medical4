<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsSended;
use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index(Request $request)
    {
        //Inertia::share('props', ['errors' => 'Error']);
        return view('contacts.create');
    }

    public function send(Request $request)
    {

        $request->validate([
            'name'   => ['required'],
            'email'   => ['required', 'email'],
            'message' => ['required'],
            'g-recaptcha-response' => ['required', new Recaptcha]
        ], [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El correo electrónico es requerido',
            'email.email' => 'El correo electrónico ingresado es inválido',
            'message.required' => 'El mensaje es requerido'
        ]);

        Mail::to('contacto@enoecruzneuro.com.mx')->send(new ContactUsSended($request));

        $request->session()->flash('success', 'El correo se envió correctamente');

        return redirect()->back();
    }
}
