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
            'name' => 'required|string',
            'author' => 'gt:0',
            'genres' => 'required',
            'pubHouse' => 'required|min:2',
            'price' => 'required|int',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'author.gt' => 'Вы не выбрали автора',
            'genres.required' => 'Выберите хотя бы один жанр',
            'image.required' => 'Вы не выбрали обложку',
        ];
    }
}
