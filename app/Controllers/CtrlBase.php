<?php

namespace App\Controllers;


class CtrlBase extends BaseController
{
    private string $locale;

    public function __construct(){

    }

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
    protected function getBaseTemplate(): array
    {
        helper(['langObject']);
        return [
            "locale" => $this->getLocale()
        ];
    }
}
