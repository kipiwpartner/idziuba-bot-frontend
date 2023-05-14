<?php

namespace App\Controllers\DefaultControllers;

class Login extends DefaultCtrl
{
    const pageView = "pagesView/default/login/indexTpl";
    const pageVue = "pagesVue/default/login/indexVue";

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    public function login(): string
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
            'pageTestVue' => "pagesVue/default/test/indexVue",
            'test' => 'Value from Login Controller',
            ...parent::getDefaultCtrlTemplate()
        ];
        return $data;
    }
}
