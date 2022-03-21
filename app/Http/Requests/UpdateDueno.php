<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UpdateDueno extends FormRequest
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
            'id'=>'required|exists:duenos,id_du',
            'nombres'=>'nullable|max:255',
            'apellidos'=>'nullable|max:255',
            'celular'=>'nullable|min:12|max:12',
            'email'=>'nullable|email:rfc,dns|max:255',
        ];
    }

    public function validationData()
    {
        return array_merge($this->request->all(), [
            'id' => Route::input('dueno'),
        ]);
    }
}
