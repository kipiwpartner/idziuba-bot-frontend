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
    private function getOnAxiosCallsAPI(): array
    {
        return [
            'auth' => getenv('apiVersionToPHP') . "/auth/onAxiosCall"
        ];
    }

    /**
     * @return array
     */
    private function getOnAxiosCallsGraphQL(): array
    {
        return [
            'login' => "auth/login"
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
            "axiosAPI" => $this->getOnAxiosCallsAPI(),
            "axiosGraphQL" => $this->getOnAxiosCallsGraphQL()
        ];
    }
}
