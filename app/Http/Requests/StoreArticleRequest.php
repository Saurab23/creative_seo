<?php

namespace App\Http\Requests;

use App\Article;
use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('article_create');
    }

    public function rules()
    {
        return [
            'title'         => [
                'required',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories'   => [
                'required',
                'array',
            ],
            'tags.*' => [
                'integer',
            ],
            'tags'   => [
                'required',
                'array',
            ],
        ];
    }
}
