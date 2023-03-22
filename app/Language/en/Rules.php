<?php

// override core en language system validation or define your own en language validation message
return [
    'labels' => [
        'email' => 'E-mail',
        'password' => 'Password'
    ],
    'errors' => [
        'required' => 'Required',
        'valid_email' => 'Invalid {field}',
        'min_length' => 'Bad length {param}',
        'bad_request' => 'Bad request'
    ],
    'placeholders' => [
        'email' => 'Please input your e-mail',
        'password' => 'Please input your password'
    ]
];
