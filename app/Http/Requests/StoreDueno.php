<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDueno extends FormRequest
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
            'nombres'=>'required|max:255',
            'apellidos'=>'required|max:255',
            'celular'=>'nullable|min:12|max:12',
            'email'=>'nullable|email:rfc,dns|max:255',
            'token'=>'nullable',
        ];
    }
}
