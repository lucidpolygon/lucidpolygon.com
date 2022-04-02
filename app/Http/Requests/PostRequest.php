<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',

            'status' => 'in:draft,published',
            'type' => 'in:page,post',

            'slug' => 'nullable|max:200|unique:posts,slug,'.$this->post,
            'meta_title' => 'required_if:status,published|max:100',
            'meta_description' => 'required_if:status,published|max:200',

            'title' => 'nullable|max:200',
            'content' => 'nullable',
            'excerpt' => 'nullable|max:200',
            'is_code' => 'boolean',
            'author_id' => 'required|exists:users,id'
        ];
    }
}
