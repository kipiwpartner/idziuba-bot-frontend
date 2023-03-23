<?php

namespace Config\CURLRequests;

use Config\CURLRequest;

abstract class CURLCreator
{
    abstract public function factoryMethod(): CURLTo;

    public function doRequest(string $method, CURLRequest $curl){

        $curlTo = $this->factoryMethod();
        $response = null;
        switch (strtolower($method)) {
            case 'get':
                $response = $curl->client->get($curlTo->urlToGet());
                break;
            default:
                break;
        }
        return $response;
    }

}