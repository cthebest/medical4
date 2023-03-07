<?php

namespace App\Http\Livewire;

use App\Models\Component as ModelsComponent;
use App\Models\ComponentOption;
use Livewire\Component;

class MenuTypeForm extends Component
{

    public $field;
    public $components;
    public $component_id;
    public $component_option_id;
    public $title;
    public $resource_id;

    public function mount($component_option_id)
    {
        $this->component_option_id = $component_option_id;

        $this->searchComponentOption();
    }

    public function render()
    {
        return view('livewire.menu-type-form');
    }


    public function openComponent()
    {
        $this->components = ModelsComponent::with('component_options')->get();

        $this->dispatchBrowserEvent('openComponent');
    }


    public function componentOptionChoosed(ComponentOption $componentOption)
    {
        $this->component_option_id = $componentOption->id;
        $this->component_id = $componentOption->component->id;
        $this->title = $componentOption->name;
        $this->field = $componentOption->livewire_field;
        $this->dispatchBrowserEvent('closeComponent');
    }

    private function searchComponentOption()
    {
        if (!$this->component_option_id) return;
        $componentOption = ComponentOption::find($this->component_option_id);
        $this->component_id = $componentOption->component->id;
        $this->title = $componentOption->name;
        $this->field = $componentOption->livewire_field;
    }
}
