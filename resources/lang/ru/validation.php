<?php

    return [
        'attributes' => [
            'user_name' => 'Имя пользователя',
            'user_email' => 'Email',
            'old_password' => 'Старый пароль',
            'new_password' => 'Новый пароль',
            'new_password_confirmation' => 'Проверка пароля',
        ],

        'required' => 'Вы не заполнили поле ":attribute"',
        'min' => [
            'numeric' => 'The :attribute must be at least :min.',
            'file' => 'The :attribute must be at least :min kilobytes.',
            'string' => 'В поле ":attribute" нужно ввести минимум :min символа',
            'array' => 'The :attribute must have at least :min items.',
        ],
        'integer' => 'В поле ":attribute" должно находиться число',
        'confirmed' => 'Поле ":attribute" не совпадает с проверочным полем',
        'password' => 'Вы ввели неправильный пароль',
        'email' => 'Вы поле ":attribute" должена быть указан почта',
        'unique' => 'Такой ":attribute" уже используется'
    ];
?>
