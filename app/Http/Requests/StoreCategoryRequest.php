<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|max:50|min:3',
            'description' => 'required|max:100|min:10',
            'image1' => 'required',
            'image2' => 'required'
        ];     
    }

    public function messages()
    {
        return [
            'image1.required' => 'Es necesario seleccionar un archivo para el campo de imagen 1.',
            'image2.required' => 'Es necesario seleccionar un archivo para el campo de imagen 2.'
        ];
    }
}