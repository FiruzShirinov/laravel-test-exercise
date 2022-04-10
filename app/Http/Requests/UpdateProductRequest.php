<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'              => "required|string|min:3|max:150|unique:products,name,{$this->product->id}",
            'price'             => 'required|numeric|min:0',
            'published_at'      => 'nullable|date',
            'category_ids'      => 'required|array|distinct|min:2|max:10|exists:categories,id',
        ];
    }
}
