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
                    'rules'  => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'Rules.errors.required',
                        'min_length' => 'Rules.errors.min_length',
                    ],
                ],
            ]
        );
        $check = $this->validation->withRequest($request)->run();
        return [
            "result" => $check,
            "errors" => $this->validation->getErrors()
        ];
    }

    public function validateGet(Request $request): array
    {
        return [];
    }

    public function validatePut(Request $request): array
    {
        return [];
    }

    public function validateDelete(Request $request): array
    {
        return [];
    }

    public function validatePatch(Request $request): array
    {
        return [];
    }
}