<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function rules()
    {
        return [

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'slug')->ignore($this->category)
            ],

        ];
    }

    public function messages()
    {
        return [
            'slug.unique' => 'Slug: ' . $this->slug . ' đã được sử dụng bởi một Post khác.',
        ];
    }
}
