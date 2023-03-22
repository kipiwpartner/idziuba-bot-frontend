<?php

namespace App\Controllers;


class CtrlBase extends BaseController
{
    private string $locale;

    const onAxiosCalls = [
        "auth" => "auth/onAxiosCall",
        "login" => "login/onAxiosCall"
    ];
    public function __construct(){}

    /**
     * @return string
     */
    private function getLocale(): string
    {
        $this->locale = $this->request->getLocale();
        return $this->locale;
    }

    /**
     * @return array
     */
    protected function getCtrlBaseTemplate(): array
    {
        helper(['langObject']);
        return [
            "locale" => $this->getLocale(),
            "onAxiosCalls" => self::onAxiosCalls
        ];
    }
}
