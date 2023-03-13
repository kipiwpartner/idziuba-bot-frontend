<?php

namespace App\Controllers\DefaultControllers;
use App\Controllers\CtrlBase;

class DefaultCtrl extends CtrlBase
{

    const DEFAULT_TEMPLATE = "templates/defaultTpl";

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    protected function getBaseTemplate(): array
    {
        $data = [
            "partialMenuView" => "pagesView/partials/menuTpl",
            "partialMenuVue" => "pagesVue/partials/menuTplVue",
            ...parent::getBaseTemplate()
        ];
        return $data;
    }
}
