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
    private function getOnAxiosRoutesAPI(): array
    {
        return [
            'auth' => getenv('apiVersionToPHP') . "/auth/onAxiosCall"
        ];
    }

    /**
     * @return array
     */
    private function getOnAxiosRoutesGraphQL(): array
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
            "lang" => [
                "translate" => langObj('Translate.lang'),
                "form" => [
                    "labels" => langObj('Form.labels'),
                    "placeholders" => langObj('Form.placeholders'),
                    "errors" => langObj('Form.errors'),
                    ],
                "notify" => [
                    "titles" => langObj('Notify.titles'),
                    "msg" => langObj('Notify.msg')
                    ]
                ],
            "locale" => $this->getLocale(),
            "axiosAPI" => $this->getOnAxiosRoutesAPI(),
            "axiosGraphQL" => $this->getOnAxiosRoutesGraphQL()
        ];
    }
}
