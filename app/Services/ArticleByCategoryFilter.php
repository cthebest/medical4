<?php

namespace App\Services;

use App\Models\ComponentOption;
use App\Models\MenuItem;
use App\Services\Interfaces\RouteFilter;

class ArticleByCategoryFilter implements RouteFilter
{
    public function handle(ComponentOption $option, $resource): null|string
    {
        $isDependsCategory = (bool)$resource->category;
        $menuItem = $option->menu_items->where('resource_id', $isDependsCategory ? $resource->category->id : $resource->id)->first();
        $path = $isDependsCategory && $menuItem ? $menuItem->path . '/' . $resource->alias : $menuItem?->path;
        return $path ? url($path) : null;
    }
}
