<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
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
            'tittleCoverImage1' => 'nullable|max:30|min:3',
            'descriptionCoverImage1' => 'nullable|max:60|min:8',
            'tittleCoverImage2' => 'nullable|max:30|min:3',
            'descriptionCoverImage2' => 'nullable|max:60|min:8',
            'tittleCoverImage3' => 'nullable|max:30|min:3',
            'descriptionCoverImage3' => 'nullable|max:60|min:8',
            'tittleCoverImage4' => 'nullable|max:30|min:3',
            'descriptionCoverImage4' => 'nullable|max:60|min:8',
            'tittleCoverImage5' => 'nullable|max:30|min:3',
            'descriptionCoverImage5' => 'nullable|max:60|min:8',
            'tittleCoverImage6' => 'nullable|max:30|min:3',
            'descriptionCoverImage6' => 'nullable|max:60|min:8',
            'tittleCoverImage7' => 'nullable|max:30|min:3',
            'descriptionCoverImage7' => 'nullable|max:60|min:8',
            'tittleCoverImage8' => 'nullable|max:30|min:3',
            'descriptionCoverImage8' => 'nullable|max:60|min:8'
        ];
    }

    public function messages()
    {
        return [
            'tittleCoverImage1.max' => 'El título de la imagen de portada 1 no debe ser mayor que 30 caracteres.',
            'tittleCoverImage1.min' => 'El título de la imagen de portada 1 debe contener al menos 3 caracteres.',
            'descriptionCoverImage1.max' => 'La descripción de la imagen de portada 1 no debe ser mayor que 60 caracteres.',
            'descriptionCoverImage1.min' => 'La descripción de la imagen de portada 1 debe contener al menos 3 caracteres.',
            'tittleCoverImage2.max' => 'El título de la imagen de portada 2 no debe ser mayor que 30 caracteres.',
            'tittleCoverImage2.min' => 'El título de la imagen de portada 2 debe contener al menos 3 caracteres.',
            'descriptionCoverImage2.max' => 'La descripción de la imagen de portada 2 no debe ser mayor que 60 caracteres.',
            'descriptionCoverImage2.min' => 'La descripción de la imagen de portada 2 debe contener al menos 3 caracteres.',
            'tittleCoverImage3.max' => 'El título de la imagen de portada 3 no debe ser mayor que 30 caracteres.',
            'tittleCoverImage3.min' => 'El título de la imagen de portada 3 debe contener al menos 3 caracteres.',
            'descriptionCoverImage3.max' => 'La descripción de la imagen de portada 3 no debe ser mayor que 60 caracteres.',
            'descriptionCoverImage3.min' => 'La descripción de la imagen de portada 3 debe contener al menos 3 caracteres.',
            'tittleCoverImage4.max' => 'El título de la imagen de portada 3 no debe ser mayor que 30 caracteres.',
            'tittleCoverImage4.min' => 'El título de la imagen de portada 3 debe contener al menos 3 caracteres.',
            'descriptionCoverImage4.max' => 'La descripción de la imagen de portada 3 no debe ser mayor que 60 caracteres.',
            'descriptionCoverImage4.min' => 'La descripción de la imagen de portada 3 debe contener al menos 3 caracteres.',
            'tittleCoverImage5.max' => 'El título de la imagen de portada 1 no debe ser mayor que 30 caracteres.',
            'tittleCoverImage5.min' => 'El título de la imagen de portada 1 debe contener al menos 3 caracteres.',
            'descriptionCoverImage5.max' => 'La descripción de la imagen de portada 1 no debe ser mayor que 60 caracteres.',
            'descriptionCoverImage5.min' => 'La descripción de la imagen de portada 1 debe contener al menos 3 caracteres.',
            'tittleCoverImage6.max' => 'El título de la imagen de portada 2 no debe ser mayor que 30 caracteres.',
            'tittleCoverImage6.min' => 'El título de la imagen de portada 2 debe contener al menos 3 caracteres.',
            'descriptionCoverImage6.max' => 'La descripción de la imagen de portada 2 no debe ser mayor que 60 caracteres.',
            'descriptionCoverImage6.min' => 'La descripción de la imagen de portada 2 debe contener al menos 3 caracteres.',
            'tittleCoverImage7.max' => 'El título de la imagen de portada 3 no debe ser mayor que 30 caracteres.',
            'tittleCoverImage7.min' => 'El título de la imagen de portada 3 debe contener al menos 3 caracteres.',
            'descriptionCoverImage7.max' => 'La descripción de la imagen de portada 3 no debe ser mayor que 60 caracteres.',
            'descriptionCoverImage7.min' => 'La descripción de la imagen de portada 3 debe contener al menos 3 caracteres.',
            'tittleCoverImage8.max' => 'El título de la imagen de portada 3 no debe ser mayor que 30 caracteres.',
            'tittleCoverImage8.min' => 'El título de la imagen de portada 3 debe contener al menos 3 caracteres.',
            'descriptionCoverImage9.max' => 'La descripción de la imagen de portada 3 no debe ser mayor que 60 caracteres.',
            'descriptionCoverImage9.min' => 'La descripción de la imagen de portada 3 debe contener al menos 3 caracteres.',
        ];
    }
}