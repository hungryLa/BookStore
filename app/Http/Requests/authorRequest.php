<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class authorRequest extends FormRequest
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
            'FName' => 'Имя',
            'SName' => 'Фамилия',
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
                'FName' => 'required|min:3',
                'SName' => 'required|min:3',
        ];
    }
}
