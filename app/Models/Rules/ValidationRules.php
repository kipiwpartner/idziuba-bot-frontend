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
                break;
            case 'post':
                return $validation->validatePost($request);
                break;
//            case 'put':
//                break;
//            case 'patch':
//                break;
            default:
                return [
                    "errors" => lang('Rules.errors.bad_request'),
                    "result" => false
                ];
        }
    }

}