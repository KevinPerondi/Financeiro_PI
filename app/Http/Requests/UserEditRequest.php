<?php

namespace PI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'email' => 'required|email',
            'telefone' => 'required|alpha_num|between:10,11',
            'endereço' => 'required|string|between:3,100',
            'password' => 'required|max:50'
        ];
    }
}
