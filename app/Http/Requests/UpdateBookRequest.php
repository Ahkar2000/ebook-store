<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|unique:books,name,'.$this->route('book')->id,
            'author_name' => 'required|min:1',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:1',
            'review' => 'required|min:20',
            'pdf' => 'mimes:pdf',
        ];
    }
}
