<?php

namespace App\Controllers\DefaultControllers\API\v1;

use App\Controllers\DefaultControllers\DefaultCtrl;
use App\Models\Rules\Auth\RulesAuthFactory;
use App\Models\Rules\ValidationRules;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Validation\ValidationInterface;
use Config\CURLRequests\CURLInstances\CURLToLocalhost;
use Config\CURLRequests\CURLToLocalhost\CURLToCreator\CURLToCreatorToAuth;
use Config\Services;
use CodeIgniter\API\ResponseTrait;

class Auth extends DefaultCtrl
{
    use ResponseTrait;

    private ValidationInterface $validation;

    public function __construct()
    {
        parent::__construct();
        $this->validation = Services::validation();
    }

    /**
     * @return ResponseInterface
     */
    public function onAxiosCall(): ResponseInterface
    {
        $validationRules = new ValidationRules();
        $validation = $validationRules->validateFields(new RulesAuthFactory(), $this->request);;
        $curl = new CURLToLocalhost();
        $curlCreator = new CURLToCreatorToAuth();

        $response["resp"] = $curlCreator->doRequest($this->request->getMethod(), $curl, $this->request->getJSON());
        $response["validation"] = $validation;
        return $this->respond($response, 200);
    }

}
