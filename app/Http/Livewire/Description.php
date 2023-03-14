<?php

namespace App\Http\Livewire;

use Livewire\Component;

define('MAX_CHARACTERS', 125);

class Description extends Component
{
    public int $chars_left = MAX_CHARACTERS;
    public string|null $description;

    public function mount($description)
    {
        $this->description = $description;

        if ($description) {
            $this->chars_left = $this->chars_left = MAX_CHARACTERS - strlen($description);
        }
    }

    public function render()
    {
        return view('livewire.description');
    }

    public function updatingDescription($value)
    {
        $this->chars_left = MAX_CHARACTERS - strlen($value);
    }
}
