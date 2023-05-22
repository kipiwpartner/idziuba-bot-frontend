<?php

// override core en language system validation or define your own en language validation message
return [
    'labels' => [
        'email' => 'E-mail',
        'password' => 'Password'
    ],
    'placeholders' => [
        'email' => 'Enter your e-mail address',
        'password' => 'Enter your password'
    ],
    'buttons' => [
        'send' => 'Send',
        'notify' => 'Notify'
    ],
    'errors' => [
        'required' => 'Field {field} is required',
        'valid_email' => 'Field {field} is invalid',
        'min_length' => 'Field {field} must be grater than {param} characters'
    ]
];
