<?php

namespace App\Controllers\DefaultControllers;

use App\Models\Rules\Auth\RulesAuthFactory;
use App\Models\Rules\ValidationRules;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Validation\ValidationInterface;
use Config\CURLRequests\CURLInstances\CURLToLocalhost;
use Config\CURLRequests\CURLToLocalhost\CURLToCreator\CURLCreatorToRoles;
use Config\Services;

class Auth extends DefaultCtrl
{
    private ValidationInterface $validation;

    public function __construct()
    {
        $this->validation = Services::validation();
    }

    /**
     * @return ResponseInterface
     */
    public function onAxiosCall(): ResponseInterface
    {
        $validationRules = new ValidationRules();
        $data = $validationRules->validateFields(new RulesAuthFactory(), $this->request);;
        $curl = new CURLToLocalhost();
        $curlCreator = new CURLCreatorToRoles();
        $response = $curlCreator->doRequest('get', $curl);
        return $this->response->setJSON($response);
    }

}
