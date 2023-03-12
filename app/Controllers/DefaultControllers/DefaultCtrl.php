<?php

namespace App\Controllers\DefaultControllers;
use App\Controllers\CtrlBase;

class DefaultCtrl extends CtrlBase
{

    const DEFAULT_TEMPLATE = "templates/defaultTpl";

    public function __construct()
    {
    }

    /**
     * @return array
     */
    protected function getBaseTemplate(): array
    {
        $data = [
            "partialMenuView" => "pagesView/default/partials/menuTpl",
            "partialMenuVue" => "pagesVue/default/partials/menuTplVue",
            ...parent::getBaseTemplate()
        ];
        return $data;
    }
}
