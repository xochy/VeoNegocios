<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoreRequest extends FormRequest
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
            'profileImage' => 'required',
            'coverImage1' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'profileImage.required' => 'El campo de imagen de perfil de negocio es obligatorio',
            'coverImage1.required' => 'El campo de imagen de portada 1 es obligatorio'
        ];
    }
}