<?php

namespace App\Services;

use App\Models\ComponentOption;
use App\Models\MenuItem;
use App\Services\Interfaces\RouteFilter;

class SingleArticleFilter implements RouteFilter
{
    public function handle(ComponentOption $option, $resource): null|string
    {
        if (!$resource->category) return null;
        $menuItem = $option->menu_items->where('resource_id', $resource->id)->first();
        return $menuItem ? url($menuItem->path) : null;
    }
}
