<?php

namespace App\Services;

use App\Models\ComponentOption;
use App\Models\MenuItem;
use App\Services\Interfaces\RouteFilter;

class AllArticlesFilter implements RouteFilter
{
    public function handle(ComponentOption $option, $resource): null|string
    {
        $menuItem = $option->menu_items->first();

        return $menuItem ? url($menuItem->path . '/' . $resource->alias) : null;
    }
}
