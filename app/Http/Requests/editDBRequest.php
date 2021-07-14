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

    public function attributes()
    {
        return [
            'pubHouse' => 'Издательство книги',
            'name' => 'Название книги',
            'price' => 'Цена',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pubHouse' => 'required|min:2',
            'author' => 'gt:0',
            'name' => 'required|string',
            'visible' => 'between:0,1',
            'genres' => 'required',
            'price' => 'required|int',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'author.gt' => 'Вы не выбрали автора',
            'visible.between' => 'Вы не выбрали видимость',
            'genres.required' => 'Выберите хотя бы один жанр',
            'image.required' => 'Вы не выбрали обложку',
        ];
    }
}
