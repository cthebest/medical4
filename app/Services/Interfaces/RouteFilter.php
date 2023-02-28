<?php

namespace App\Services\Interfaces;

use App\Models\ComponentOption;
use App\Models\MenuItem;

interface RouteFilter
{
    public function handle(ComponentOption $option, $resource): null|string;
}
