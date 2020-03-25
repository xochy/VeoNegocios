<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'address_address' => 'required|max:200|min:10',
            'reference' => 'required|max:250|min:10',
            'schedule' => 'required|max:250|min:10'
        ];
    }

    public function messages()
    {
        return [
            'address_address.required' => 'El campo dirección es obligatorio',
            'address_address.max' => 'dirección no debe ser mayor que 200 caracteres.',
            'address_address.min' => 'dirección debe contener al menos 10 caracteres.',
            'reference.required' => 'El campo referencias es obligatorio',
            'reference.max' => 'referencias no debe ser mayor que 250 caracteres.',
            'reference.min' => 'referencias debe contener al menos 10 caracteres.',
            'schedule.required' => 'El campo horario es obligatorio',
            'schedule.max' => 'horario no debe ser mayor que 250 caracteres.',
            'schedule.min' => 'horario debe contener al menos 10 caracteres.'
        ];
    }
}