<?php

namespace Config\CURLRequests\CURLToLocalhost\CURLTo;

use Config\CURLRequests\CURLToLocalhost\CURLTo;

class CURLToAuth implements CURLTo
{

    public function urlToGet(): string
    {
        return '';
    }

    public function urlToPost(): string
    {
        return getenv('apiVersionToBack') . '/auth/login';
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