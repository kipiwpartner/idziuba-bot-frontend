<?php

namespace Config\CURLRequests\CURLInstances;

use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\URI;
use Config\App;
use Config\CURLRequest;

class CURLToLocalhost extends CURLRequest
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
            new App(),
            new URI(),
            new Response(new App()),
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
}
