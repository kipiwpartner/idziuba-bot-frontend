<?php

namespace App\Controllers\DefaultControllers;

use CodeIgniter\HTTP\ResponseInterface;

class Login extends DefaultCtrl
{
    const pageView = "pagesView/default/login/indexTpl";
    const pageVue = "pagesVue/default/login/indexTplVue";
    const onAxiosCall = "onAxiosCall";

    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function login(): string
    {
        return view(self::DEFAULT_TEMPLATE, ['data' => [...$this->getLoginTemplate()]] );
    }

    /**
     * @return ResponseInterface
     */
    public function onAxiosCall(): ResponseInterface
    {
        $data = [
            "test" => "Same data"
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
            'onAxiosCall' => self::onAxiosCall,
            'test' => 'Value from Controller',
            ...parent::getDefaultTemplate()
        ];
        return $data;
    }
}
