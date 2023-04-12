<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use Livewire\Component;

class BannerModule extends Component
{
    public function render()
    {

        $banners = Banner::wherePublished(1)->get();
        return view('livewire.banner-module', compact('banners'));
    }
}
