<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class FaqTable extends Component
{
    use AuthorizesRequests;
    public function render()
    {
        $faqs = Faq::paginate(12);
        return view('livewire.faq-table', compact('faqs'));
    }

    public function destroy(Faq $faq)
    {
        $this->authorize('delete', $faq);
        $faq->delete();
        session()->flash('success', 'Pregunta eliminada con éxito');
    }
}
