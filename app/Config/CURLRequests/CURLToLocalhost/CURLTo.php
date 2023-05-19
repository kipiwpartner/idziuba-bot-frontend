<?php

namespace Config\CURLRequests\CURLToLocalhost;

interface CURLTo
{
    public function urlToGet(): string;
    public function urlToPost(): string;
    public function urlToPut(): string;
    public function urlToDelete(): string;

}