<?php

namespace App\Controllers\DefaultControllers;

class Login extends DefaultCtrl
{
    const pageView = "pagesView/default/login/indexTpl";
    const pageVue = "pagesVue/default/login/indexTplVue";

    public function __construct()
    {
    }

    public function login()
    {
        return view(self::DEFAULT_TEMPLATE, ['data' => [...$this->getLoginTemplate()]] );
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
            ...parent::getBaseTemplate()
        ];
        return $data;
    }
}
