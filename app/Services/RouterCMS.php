<?php

namespace App\Services;

use App\Models\Component;
use App\Models\MenuItem;

class RouterCMS
{
    /**
     * Método que busca y retorna la URL asociada a un modelo dado.
     *
     * @param $model El modelo para el cual se quiere obtener la URL.
     * @return string La URL asociada al modelo o una cadena vacía si no se encuentra.
     */
    public static function parseToUrl($model)
    {
        // Buscamos el componente asociado al modelo.
        $component = Component::with('component_options')->whereName($model->getComponent())->first();
        // Si no se encuentra el componente, retornamos una cadena vacía.
        if (!$component) return '';

        $url = '#';
        // Obtenemos las opciones asociadas al componente.
        $componentOptions = $component->component_options;
        // Iteramos sobre cada opción.
        foreach ($componentOptions as $componentOption) {
            // Cargamos los ítems de menú asociados a la opción.
            $componentOption = $componentOption->load('menu_items');
            // Obtenemos la clase encargada de filtrar la URL.
            $class = $componentOption->filter;
            $routeFilter = new $class();
            // Obtenemos la URL asociada a la opción y al modelo.
            $url = $routeFilter->handle($componentOption, $model);
            // Si se encuentra una URL válida, terminamos la búsqueda.
            if ($url) break;
        }


        return $url ?? '#';
    }

    public static function run()
    {
        $path = self::getPath();
        $menuItem = null;
        $resource = null;
        while ($path) {
            $menuItem = self::getMenuItem($path);

            if ($menuItem) {
                break;
            }

            $pos = strrpos($path, '/');
            $resource = substr($path, $pos + 1);
            $path = substr($path, 0, $pos);
        }
        if (!$menuItem) abort(404);
        $route_name = $menuItem->component_option->route ?? null;
        $field = 'alias';

        if ($resource) {
            $route_name = $menuItem->component_option->component->route;
        } else {
            $field = 'id';
            $resource = $menuItem->resource_id;
        }
        if (!$route_name) abort(404);
        $routes = \Route::getRoutes();
        $route = $routes->getByName($route_name);

        if (!$route) {
            abort_if(!$route_name, 404);
        }

        $route->bind(request());
        $parameters = $route->signatureParameters();
        foreach ($parameters as $parameter) {
            if (strcasecmp('field', $parameter->name) === 0) {
                $route->setParameter($parameter->name, $field);
            } else {
                $route->setParameter($parameter->name, $resource);
            }

        }
        // Le asignamos los parámetros
        return $route->run();
    }

    private static function getPath(): string
    {
        return request()->path();
    }

    private static function getMenuItem($path)
    {
        return MenuItem::with('component_option')->where('path', $path)->first();
    }
}
