<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        // Route Model Binding: $this->route('post') returns Post model
        $postId = $this->route('post')->id;
        
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $postId,
            'status' => 'required|in:draft,published,archived,deleted',
            'author_id' => 'required|exists:users,id',
        ];
    }
}
