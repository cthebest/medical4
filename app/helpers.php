<?php

use App\Services\RouterCMS;

if (!function_exists('to_url')) {
    function to_url($model): string
    {
        return RouterCMS::parseToUrl($model);
    }
}
