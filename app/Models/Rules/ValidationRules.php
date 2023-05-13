<?php

namespace App\Models\Rules;

use CodeIgniter\HTTP\Request;

class ValidationRules
{
    /**
     * @param AbstractFactoryValidation $factory
     * @param Request $request
     * @return array
     */
    public function validateFields(AbstractFactoryValidation $factory, Request $request): array
    {
        $validation = $factory->createRules();
        switch ($request->getMethod()) {
            case 'get':
                $validation->validateGet($request);
            case 'post':
                return $validation->validatePost($request);
            case 'put':
                return $validation->validatePut($request);
            case 'patch':
                $validation->validatePatch($request);
            default:
                return [
                    "errors" => lang('Rules.errors.bad_request'),
                    "result" => false
                ];
        }
    }

}