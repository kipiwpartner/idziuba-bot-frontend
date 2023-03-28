<?php

namespace Config\CURLRequests\CURLToLocalhost\CURLTo;

use Config\CURLRequests\CURLToLocalhost\CURLTo;

class CURLToRoles implements CURLTo
{

    public function urlToGet(): string
    {
        return '/role/list';
    }

    public function urlToPost(): string
    {
        return '';
    }

    public function urlToPut(): string
    {
        return '';
    }

    public function urlToDelete(): string
    {
        return '';
    }
}