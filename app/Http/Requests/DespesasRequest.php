<?php

namespace PI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DespesasRequest extends FormRequest
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
            'valor' => 'required|numeric',
            'descrição' => 'required|between:6,255',
            'vencimento' => 'required|date_format:"d/m/Y"'
        ];
    }
}
