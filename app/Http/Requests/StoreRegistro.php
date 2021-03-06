<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistro extends FormRequest
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
            'fecha'=>'nullable|date',
            'log'=>'nullable',
            'tipo'=>'nullable|max:255',
            'saldo'=>'nullable|numeric',
            'equipo_id'=>'required|exists:equipos,id_eq',
        ];
    }
}
