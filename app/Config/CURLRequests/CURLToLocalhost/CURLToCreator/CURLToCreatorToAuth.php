<?php

namespace Config\CURLRequests\CURLToLocalhost\CURLToCreator;

use Config\CURLRequests\CURLToLocalhost\CURLTo;
use Config\CURLRequests\CURLToLocalhost\CURLTo\CURLToAuth;
use Config\CURLRequests\CURLToLocalhost\CURLToCreator;

class CURLToCreatorToAuth extends CURLToCreator
{

    public function factoryMethod(): CURLTo
    {
        return new CURLToAuth();
    }
}