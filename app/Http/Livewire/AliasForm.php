<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AliasForm extends Component
{
    public string|null $name;
    public string|null $alias;
    public string|null $name_property;

    public function render()
    {
        return view('livewire.alias-form');
    }

    public function updatedName($value)
    {
        $this->alias = \Str::slug($value);
    }
}
