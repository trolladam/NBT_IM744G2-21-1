<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post.title' => 'required|max:200',
            'post.topic_id' => 'required|exists:topics,id',
            'post.description' => 'required|min:10|max:350',
            'post.content' => 'required',
        ];
    }
}
