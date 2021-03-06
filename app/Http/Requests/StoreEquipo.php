<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipo extends FormRequest
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
            'nick'=>'required|max:255',
            'serial'=>'required|max:255',
            'software'=>'nullable|max:10',
            'hardware'=>'nullable|max:10',
            'ip'=>'nullable|ip',
            'propietario'=>'required|exists:duenos,id_du',
        ];
    }
}
