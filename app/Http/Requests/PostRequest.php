<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules()
    {
        return [

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('posts', 'slug')->ignore($this->post)
            ],

        ];
    }

    public function messages()
    {
        return [
            'slug.unique' => 'Slug:' . $this->slug . ' đã được sử dụng bởi một Post khác.',
        ];
    }
}
