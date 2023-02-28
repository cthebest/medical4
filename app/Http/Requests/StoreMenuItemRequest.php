<?php

namespace App\Http\Requests;

use App\Models\MenuItem;
use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'title' => 'required|unique:menu_items,title',
            'alias' => 'required|unique:menu_items,alias',
            'component_id' => 'required|exists:components,id',
            'component_option_id' => 'required|exists:component_options,id',
            'resource_id' => 'nullable',
            'icon' => 'nullable'
        ];
    }
}
