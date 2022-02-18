<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlan extends FormRequest
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
            'id'=>'required|exists:planes,id_pl',
            'nick'=>'nullable|max:255',
            'tiempo'=>'required|date_format:y:i:s',
            'valor'=>'nullable|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'tiempo.date_format' => 'The tiempo does not match the format HH:mm:ss 00:00:01 - 99:99:99.',
        ];
    }
}
