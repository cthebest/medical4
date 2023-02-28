<?php

namespace App\Http\Requests;

use App\Enums\ArticleStatus;
use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Article::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public
    function rules()
    {
        return [

            'title' => [
                'required',
                Rule::unique('articles', 'title')
            ],
            'alias' => [
                'required',
                Rule::unique('articles', 'alias')
            ],
            'status' => [
                'required',
                new Enum(ArticleStatus::class)
            ],
            'description' => 'nullable',
            'image' => 'nullable',
            'tags' => 'nullable|array',
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')
            ]

        ];
    }
}
