<?php

namespace App\Services;

use Config\Session;


class ServiceAuth extends Session
{
    /**
     * @property array|bool|\CodeIgniter\Session\Session|float|int|object|string|null $session
     */
    private $session;
    public function __construct()
    {
        parent::__construct();
        $this->session = session();
    }

    /**
     * @param array $responseUser
     * @return void
     */
    public function authApi(array $responseUser): void
    {
        $this->session->set('user', $responseUser);
    }
}