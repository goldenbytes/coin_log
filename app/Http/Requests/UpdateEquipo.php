<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipo extends FormRequest
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
            'id'=>'required|exists:equipos,id_eq',
            'nick'=>'nullable|max:255',
            'serial'=>'nullable|max:255',
            'ip'=>'nullable|ip',
            'propietario'=>'nullable|exists:duenos,id_du',
        ];
    }
}
