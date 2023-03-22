<?php

namespace Config;

use \Config\CURLRequest;

class CURLCommon extends CURLRequest
{
    public string $baseURI = '';

    public string $userAgent = '';

    /**
     * @var \CodeIgniter\HTTP\CURLRequest
     */
    public \CodeIgniter\HTTP\CURLRequest $client;

    public function __construct()
    {
        parent::__construct();
        $this->client = new \CodeIgniter\HTTP\CURLRequest(
            new \Config\App(),
            new \CodeIgniter\HTTP\URI(),
            new \CodeIgniter\HTTP\Response(new \Config\App()),
            [
                'headers' => [
                    'User-Agent' => $this->userAgent,
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                    'cache-control' => 'no-cache',
                    'Authorization' => 'Bearer dsadasdasdasddasdasqwe'
                ],
                'timeout' => 5,
                'connect_timeout' => 0,
                'baseURI' => $this->baseURI
            ]
        );
    }

    public function onRequestCall(string $method){

    }
}
