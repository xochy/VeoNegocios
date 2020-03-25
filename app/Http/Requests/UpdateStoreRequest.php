<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreRequest extends FormRequest
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
            'name' => 'required|max:40|min:3',
            'description' => 'required|max:150|min:10',
            'tittleCoverImage1' => 'nullable|max:30|min:3',
            'descriptionCoverImage1' => 'nullable|max:150|min:8',
            'tittleCoverImage2' => 'nullable|max:30|min:3',
            'descriptionCoverImage2' => 'nullable|max:150|min:8',
            'tittleCoverImage3' => 'nullable|max:30|min:3',
            'descriptionCoverImage3' => 'nullable|max:150|min:8'
        ];
    }

    public function messages()
    {
        return [
            'tittleCoverImage1.max' => 'El título de la imagen de portada 1 no debe ser mayor que 30 caracteres.',
            'tittleCoverImage1.min' => 'El título de la imagen de portada 1 debe contener al menos 3 caracteres.',
            'descriptionCoverImage1.max' => 'La descripción de la imagen de portada 1 no debe ser mayor que 150 caracteres.',
            'descriptionCoverImage1.min' => 'La descripción de la imagen de portada 1 debe contener al menos 3 caracteres.',
            'tittleCoverImage2.max' => 'El título de la imagen de portada 2 no debe ser mayor que 30 caracteres.',
            'tittleCoverImage2.min' => 'El título de la imagen de portada 2 debe contener al menos 3 caracteres.',
            'descriptionCoverImage2.max' => 'La descripción de la imagen de portada 2 no debe ser mayor que 150 caracteres.',
            'descriptionCoverImage2.min' => 'La descripción de la imagen de portada 2 debe contener al menos 3 caracteres.',
            'tittleCoverImage3.max' => 'El título de la imagen de portada 3 no debe ser mayor que 30 caracteres.',
            'tittleCoverImage3.min' => 'El título de la imagen de portada 3 debe contener al menos 3 caracteres.',
            'descriptionCoverImage3.max' => 'La descripción de la imagen de portada 3 no debe ser mayor que 150 caracteres.',
            'descriptionCoverImage3.min' => 'La descripción de la imagen de portada 3 debe contener al menos 3 caracteres.'
        ];
    }
}