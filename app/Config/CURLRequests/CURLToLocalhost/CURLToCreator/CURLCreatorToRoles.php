<?php

namespace Config\CURLRequests\CURLToLocalhost\CURLToCreator;

use Config\CURLRequests\CURLCreator;
use Config\CURLRequests\CURLTo;
use Config\CURLRequests\CURLToLocalhost\Roles\CURLToRoles;

class CURLCreatorToRoles extends CURLCreator
{

    public function factoryMethod(): CURLTo
    {
        return new CURLToRoles();
    }
}