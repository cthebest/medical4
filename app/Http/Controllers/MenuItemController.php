<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Http\Requests\StoreMenuItemRequest;
use App\Http\Requests\UpdateMenuItemRequest;
use App\Models\Component;
use App\Models\ComponentOption;
use Illuminate\Support\Str;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu_items.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu_items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreMenuItemRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuItemRequest $request)
    {

        $menuItem = new MenuItem($this->attributes($request));
        $this->associateWithModel($request, $menuItem);
        $menuItem->save();
        return redirect()->route('menu-items.create')->with('success', 'ïtem de menú creado exitosamente');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\MenuItem $menuItem
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItem $menuItem)
    {
        $menuItem->load(['component', 'component_option']);
        $menuItemOrders = MenuItem::all('order');
        return view('menu_items.edit', compact('menuItem', 'menuItemOrders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateMenuItemRequest $request
     * @param \App\Models\MenuItem $menuItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuItemRequest $request, MenuItem $menuItem)
    {
        $this->associateWithModel($request, $menuItem);
        $menuItemOrderOld = MenuItem::where('order', $request->order)->first();
        if ($menuItemOrderOld) $menuItemOrderOld->update(['order' => $menuItem->order]);

        $menuItem->update($this->attributes($request));

        return redirect()->route('menu-items.edit', $menuItem->id)->with('success', 'Ítem de menú actualizado con éxito');
    }


    private function associateWithModel($request, MenuItem &$menuItem)
    {
        $component = Component::find($request->validated('component_id'));
        $component_option = $this->getComponentOption($request->validated('component_option_id'));
        $menuItem->component()->associate($component);
        $menuItem->component_option()->associate($component_option);
    }

    private function attributes($request)
    {
        $validatedData = $request->safe()->only(['title', 'alias', 'resource_id', 'icon']);
        //Buscamos y actualizamos un item order.

        return array_merge($validatedData, [
            'path' => $this->getPath($request),
            'order' => $request->order ?? MenuItem::count() + 1,
        ]);
    }

    private function getPath($request)
    {
        $component_option = $this->getComponentOption($request->validated('component_option_id'));
        $path = '';
        if ($component_option->route || $request->value) {
            $path = $request->validated('alias');
        }

        return $path;
    }


    private function getComponentOption($component_option_id)
    {
        return ComponentOption::find($component_option_id);
    }
}
