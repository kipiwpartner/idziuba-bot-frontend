<?php

namespace App\Models\Validations\Rules;

class RulesValidation
{
    public function __construct(){}

    public static function getEmailRule(bool $required = false): array
    {
        $rules = $required ? 'required|valid_email' : 'valid_email';
        return [
            'label'  => 'Form.labels.email',
            'rules'  => $rules,
            'errors' => [
                'required' => 'Form.errors.required',
                'valid_email' => 'Form.errors.valid_email'
            ]
        ];
    }

    /**
     * @param bool $required
     * @return array
     */
    public static function getPasswordRule(bool $required = false): array
    {
        $rules = $required ? 'required|min_length[5]' : 'min_length[5]';
        return [
            'label'  => 'Form.labels.password',
            'rules'  => $rules,
            'errors' => [
                'required' => 'Form.errors.required',
                'min_length' => 'Form.errors.min_length'
            ]
        ];
    }

}