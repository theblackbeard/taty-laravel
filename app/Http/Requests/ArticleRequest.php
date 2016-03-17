<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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
            'cover' => 'required',
            'menu_id' => 'required',
            'category_id' => 'required',
            'title' => 'required|max:30',
            ''
        ];
    }

    public function messages()
    {
        return [
            'cover.required' => 'Não pode deixar sem capa',
            'menu_id.required' => 'Escolhe um menu referencia',
            'category_id.required' => 'Escolhe uma categoria',
            'title.required' => 'Não pode deixar titulo em branco',
            'title.max' => 'Não pode ultrapassar de 30 caracteres',
        ];
    }
}
