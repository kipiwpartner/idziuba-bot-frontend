<?php

namespace App\Models\Validations;

use CodeIgniter\HTTP\Request;

class ValidationRules
{
    public function __construct()
    {
    }

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
                    "errors" => lang('Notify.msg.bad_request'),
                    "result" => false
                ];
        }
    }

}