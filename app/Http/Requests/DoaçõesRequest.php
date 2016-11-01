<?php

namespace PI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoaçõesRequest extends FormRequest
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
            'donatario' => 'required|string|between:3,100',
            'valor' => 'required|numeric',
            'data' => 'required|date_format:"d/m/Y"'
        ];
    }
}
