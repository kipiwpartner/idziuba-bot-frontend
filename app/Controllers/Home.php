<?php

namespace App\Controllers;

use App\Controllers\AuthNoRequired\AuthNoRequiredBase;

class Home extends AuthNoRequiredBase
{
    const pageView = "pagesView/login/indexTpl";

    public function __construct()
    {
    }

    public function index()
    {
        return view('welcome_message');
    }

    public function login()
    {
        return view(self::TEMPLATE, ['data' => [...$this->getHomeTemplate()]] );
    }

    /**
     * @return array
     */
    public function getHomeTemplate(): array
    {
        $data = [
            'pageView' => self::pageView,
            'test' => 'Test Test',
            ...parent::getBaseTemplate()
        ];
        return $data;
    }
}
