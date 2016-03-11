<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MenuRequest extends Request
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
            'title' => 'required|max:30'
        ];
    }

    public function messages()
    {
        return [
          'title.required' => 'Não pode deixar titulo em branco',
          'title.max' => 'Não pode ultrapassar de 30 caracteres'
        ];
    }
}
