<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editDBRequest extends FormRequest
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
            'name' => 'required',
            'author' => 'required',
            'pubHouse' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Вы не указали название книги',
            'author.required' => 'Вы не указали автора',
            'pubHouse.required' => 'Вы не указали издателя'
        ];
    }
}
