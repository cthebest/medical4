<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class BannerTable extends Component
{
    use AuthorizesRequests;
    public function render()
    {
        $banners = Banner::paginate(12);
        return view('livewire.banner-table', compact('banners'));
    }

    public function destroy(Banner $banner)
    {
        $this->authorize('delete', $banner);
        $banner->delete();
        session()->flash('success', 'Banner eliminado con éxito');
    }
}
