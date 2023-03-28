<?php

namespace Config\CURLRequests\CURLToLocalhost\CURLToCreator;

use Config\CURLRequests\CURLToLocalhost\CURLTo;
use Config\CURLRequests\CURLToLocalhost\CURLTo\CURLToRoles;
use Config\CURLRequests\CURLToLocalhost\CURLToCreator;

class CURLToCreatorToRoles extends CURLToCreator
{

    public function factoryMethod(): CURLTo
    {
        return new CURLToRoles();
    }
}