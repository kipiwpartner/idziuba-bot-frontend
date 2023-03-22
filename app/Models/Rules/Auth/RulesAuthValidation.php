<?php

namespace App\Models\Rules\Auth;

use App\Models\Rules\AbstractRulesValidation;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Validation\ValidationInterface;
use Config\Services;

class RulesAuthValidation implements AbstractRulesValidation
{

    private ValidationInterface $validation;

    public function __construct()
    {
        $this->validation = Services::validation();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function validatePost(Request $request): array
    {
        $this->validation->reset();
        $this->validation->setRules(
            [
                'email' => [
                    'label'  => 'Rules.labels.email',
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'Rules.errors.required',
                        'valid_email' => 'Rules.errors.valid_email'
                    ],
                ],
                'password' => [
                    'label'  => 'Rules.labels.password',
                    'rules'  => 'required|min_length[10]',
                    'errors' => [
                        'required' => 'Rules.errors.required',
                        'min_length' => 'Rules.errors.min_length',
                    ],
                ],
            ]
        );
        $check = $this->validation->withRequest($request)->run();
        return [
            "validation" => $check,
            "errors" => $this->validation->getErrors(),
            "result" => $check
        ];
    }

    public function validateGet(): array
    {
        return [];
    }
}