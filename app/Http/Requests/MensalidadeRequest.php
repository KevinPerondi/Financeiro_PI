<?php

namespace PI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MensalidadeRequest extends FormRequest
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
            'dia' => 'required|numeric|between:1,31',
            //'status' => 'required|between:3,100',
        ];
    }
}
