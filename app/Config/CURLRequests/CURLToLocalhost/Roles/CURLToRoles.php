<?php

namespace Config\CURLRequests\CURLToLocalhost\Roles;

use Config\CURLRequests\CURLTo;

class CURLToRoles implements CURLTo
{

    public function urlToGet(): string
    {
        return '/role/list';
    }

    public function urlToPost(): string
    {
        return '/role/list';
    }
}