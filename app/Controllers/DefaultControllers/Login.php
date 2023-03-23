<?php

namespace App\Controllers\DefaultControllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Validation\ValidationInterface;
use Config\Services;

class Login extends DefaultCtrl
{
    const pageView = "pagesView/default/login/indexTpl";
    const pageVue = "pagesVue/default/login/indexTplVue";

    private ValidationInterface $validation;

    public function __construct()
    {
        $this->validation = Services::validation();
    }

    /**
     * @return string
     */
    public function login(): string
    {
//        $curl = new CURLCommon();
//        $response = $curl->client->get('/role/list');
        return view(self::DEFAULT_TEMPLATE, ['data' => [...$this->getLoginTemplate()]] );
    }

    /**
     * @return ResponseInterface
     */
    public function onAxiosCall(): ResponseInterface
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
        $check = $this->validation->withRequest($this->request)->run();
        $data = [
            "validation" => $check,
            "errors" => $this->validation->getErrors(),
            "result" => true
        ];
        return $this->response->setJSON($data);
    }

    /**
     * @return array
     */
    public function getLoginTemplate(): array
    {
        $data = [
            'pageView' => self::pageView,
            'pageVue' => self::pageVue,
            'test' => 'Value from Controller',
            ...parent::getDefaultTemplate()
        ];
        return $data;
    }
}
