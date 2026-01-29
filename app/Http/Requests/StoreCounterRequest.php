<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCounterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'key' => 'required|string|max:255|unique:counters,key',
            'value' => 'nullable|integer',
            'description' => 'nullable|string',
        ];
    }
}

