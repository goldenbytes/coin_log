<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePlanEquipo extends FormRequest
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
            'plan_id' => [
                'required', 'exists:plan_equipo,plan_pe',
            ],
            'equipo_id' => [
                'required', 'exists:plan_equipo,equipo_pe',
            ],
            'new_plan_id' => [
                'required', 'exists:planes,id_pl',
//                Rule::unique('plan_equipo','plan_pe')->where('equipo_pe', $this->equipo_id)
            ],
        ];
    }
}
