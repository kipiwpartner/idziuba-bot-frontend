<?php

namespace App\Controllers\DefaultControllers\GraphQL;

use App\Controllers\DefaultControllers\DefaultCtrl;
use App\Models\GraphQL\Queries\Role\graphQLGettersRole;
use App\Models\Rules\Auth\RulesAuthFactory;
use App\Models\Rules\ValidationRules;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;

class Auth extends DefaultCtrl
{
    use ResponseTrait;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return ResponseInterface
     */
    public function Login(): ResponseInterface
    {
        /*  GraphQL */
        $validationRules = new ValidationRules();
        $validation = $validationRules->validateFields(new RulesAuthFactory(), $this->request);

        $graphQLGettersRole = new GraphQLGettersRole();
        $response["resp"] = $validation["result"] ? $graphQLGettersRole->getAllRoles() : null;
        $response["validation"] = $validation;

        return $this->respond($response, 200);
    }

}
