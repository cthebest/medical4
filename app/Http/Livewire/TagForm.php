<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Illuminate\Support\Collection;
use Livewire\Component;

class TagForm extends Component
{
    public string $query = '';
    public $selected_tags = [];

    public function mount(array $selected_tags = [])
    {
        $this->selected_tags = [];
        foreach ($selected_tags as $selected_tag) {
            $this->selected_tags[$selected_tag['alias']] = $selected_tag;
        }
    }

    public function render()
    {
        $tags = new Collection();
        if (strlen($this->query) > 2)
            $tags = Tag::where('name', 'LIKE', "%$this->query%")->get();
        return view('livewire.tag-form', compact('tags'));
    }

    public function storeTag(): void
    {
        $tag = Tag::create([
            'name' => $this->query,
            'alias' => \Str::slug($this->query)
        ]);

        $this->addTag($tag);
    }

    public function addTag($tag): void
    {
        $tagFinding = array_key_exists($tag['alias'], $this->selected_tags);
        if (!$tagFinding)
            $this->selected_tags[$tag['alias']] = $tag;
        $this->query = '';
    }

    public function removeTag($tag): void
    {
        unset($this->selected_tags[$tag['alias']]);
    }
}
