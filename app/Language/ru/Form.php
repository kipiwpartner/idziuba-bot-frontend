<?php

// override core en language system validation or define your own en language validation message
return [
    'labels' => [
        'email' => 'Почта',
        'password' => 'Пароль'
    ],
    'placeholders' => [
        'email' => 'Введите ваш электронный адрес',
        'password' => 'Введите ваш пароль'
    ],
    'buttons' => [
        'send' => 'Отправить',
        'notify' => 'Уведомление'
    ],
    'errors' => [
        'required' => 'Поле {field} является обязательным.',
        'valid_email' => 'Поле {field} должно содержать действительный адрес электронной почты.',
        'min_length' => 'Длина поля {field} должна быть не менее {param} символов.'
    ]

];