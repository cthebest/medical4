<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use Livewire\Component;

class FaqModule extends Component
{
    public function render()
    {
        $faqs = Faq::all();
        return view('livewire.faq-module', compact('faqs'));
    }
}
