<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'description' => 'required|max: 200|min: 5',
            'score' => 'required|max: 5|min: 1',
        ];
    }

    public function messages()
    {
        return [
            'score.required' => 'Es necesario establecer una calificación.'
        ];
    }
}