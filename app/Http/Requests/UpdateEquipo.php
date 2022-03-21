<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

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
            'software'=>'nullable|max:10',
            'hardware'=>'nullable|max:10',
            'ip'=>'nullable|ip',
            'propietario'=>'nullable|exists:duenos,id_du',
        ];
    }

    public function validationData()
    {
        return array_merge($this->request->all(), [
            'id' => Route::input('equipo'),
        ]);
    }
}
