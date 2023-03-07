<?php

namespace App\Http\Requests;

use App\Models\ComponentOption;
use App\Models\MenuItem;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMenuItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', MenuItem::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $request = request();
        return [
            'title' => 'required|unique:menu_items,title',
            'alias' => 'required|unique:menu_items,alias',
            'component_id' => 'required|exists:components,id',
            'component_option_id' => 'required|exists:component_options,id',
            'resource_id' => ['nullable',
                Rule::requiredIf(function () use ($request) {
                    $componentOptionID = $request->input('component_option_id');
                    $componentOption = ComponentOption::find($componentOptionID);

                    return $componentOption ? $componentOption->livewire_field : false;
                })],
            'icon' => 'nullable'
        ];
    }
}
