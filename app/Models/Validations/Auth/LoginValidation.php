<?php

namespace App\Models\Validations\Auth;

use App\Models\Validations\AbstractRulesValidation;
use App\Models\Validations\Rules\RulesValidation;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Validation\ValidationInterface;
use Config\Services;

class LoginValidation implements AbstractRulesValidation
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
                'email' => RulesValidation::getEmailRule(true),
                'password' => RulesValidation::getPasswordRule()
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