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
    protected function getDefaultTemplate(): array
    {
        $data = [
            "partialMenuView" => "pagesView/partials/menuTpl",
            "partialMenuVue" => "pagesVue/partials/menuTplVue",
            "horizontalMenuView" => "pagesView/partials/horizontalMenuTpl",
            "horizontalMenuVue" => "pagesVue/partials/horizontalMenuVue",
            ...parent::getCtrlBaseTemplate()
        ];
        return $data;
    }
}
