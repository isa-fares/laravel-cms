<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCounterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('counter')->id;
        return [
            'key' => "required|string|max:255|unique:counters,key,{$id}",
            'value' => 'nullable|integer',
            'description' => 'nullable|string',
        ];
    }
}

