<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMenuItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->menu_item);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                Rule::unique('menu_items', 'title')->ignore($this->menu_item)
            ],
            'alias' => [
                'required',
                Rule::unique('menu_items', 'title')->ignore($this->menu_item)
            ],
            'component_id' => 'required|exists:components,id',
            'component_option_id' => 'required|exists:component_options,id',
            'resource_id' => 'nullable',
            'icon' => 'nullable',
        ];
    }
}
