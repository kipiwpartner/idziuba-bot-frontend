<?php

namespace App\Controllers;


class CtrlBase extends BaseController
{
    private string $locale;

    public function __construct(){ }

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
    private function getonAxiosCalls(): array
    {
        return [
            'auth' => getenv('apiVersion') . "/auth/onAxiosCall"
        ];
    }

    /**
     * @return array
     */
    protected function getCtrlBaseTemplate(): array
    {
        helper(['langObject']);
        return [
            "locale" => $this->getLocale(),
            "onAxiosCalls" => $this->getonAxiosCalls()
        ];
    }
}
