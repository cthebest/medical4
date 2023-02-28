<?php

namespace App\Http\Requests;

use App\Enums\ArticleStatus;
use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->article);
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
                Rule::unique('articles', 'title')->ignore($this->article)
            ],
            'alias' => [
                'required',
                Rule::unique('articles', 'alias')->ignore($this->article)
            ],
            'status' => [
                'required',
                new Enum(ArticleStatus::class)
            ],
            'description' => 'nullable',
            'category_id' => 'exists:categories,id|integer',
            'image' => 'nullable',
            'tags' => 'nullable|array'

        ];
    }
}
