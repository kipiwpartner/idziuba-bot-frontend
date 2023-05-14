<?php

namespace App\Controllers\DefaultControllers\API\v1;

use App\Controllers\DefaultControllers\DefaultCtrl;
use App\Models\Validations\Auth\LoginValidationFactory;
use App\Models\Validations\ValidationRules;
use CodeIgniter\HTTP\ResponseInterface;
use Config\CURLRequests\CURLInstances\CURLToLocalhost;
use Config\CURLRequests\CURLToLocalhost\CURLToCreator\CURLToCreatorToAuth;
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
    public function onAxiosCall(): ResponseInterface
    {
        $validationRules = new ValidationRules();
        $response["validation"] = $validationRules->validateFields(new LoginValidationFactory(), $this->request);
        $curlToLocalhost = new CURLToLocalhost();
        $curlCreatorToAuth = new CURLToCreatorToAuth();
        $response["resp"] = $curlCreatorToAuth->doRequest($this->request->getMethod(), $curlToLocalhost, $this->request->getJSON());
        return $this->respond($response, 200);
    }

}
