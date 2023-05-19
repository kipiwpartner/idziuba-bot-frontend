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
    protected function getDefaultCtrlTemplate(): array
    {
        $data = [
            //Vertical Menu
            "verticalMenuView" => "pagesView/partials/verticalMenuTpl",
            "verticalMenuVue" => "pagesVue/partials/verticalMenuVue",
            //Horizontal Menu
            "horizontalMenuView" => "pagesView/partials/horizontalMenuTpl",
            "horizontalMenuVue" => "pagesVue/partials/horizontalMenuVue",
            ...parent::getCtrlBaseTemplate()
        ];
        return $data;
    }
}
