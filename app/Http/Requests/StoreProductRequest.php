<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'        => 'required|max: 50|min : 3',
            'description' => 'nullable|max: 200|min: 5',
            'price'       => 'required|max: 13|min : 5',
            'image'       => 'required'  
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Es necesario seleccionar un archivo para el campo de imagen de producto / servicio.'
        ];
    }
}