<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug',
            'status' => 'required|in:active,inactive',
            'order' => 'nullable|integer|min:0',
        ];
    }
}
