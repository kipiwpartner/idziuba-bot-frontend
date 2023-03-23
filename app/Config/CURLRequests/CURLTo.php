<?php

namespace Config\CURLRequests;

interface CURLTo
{
    public function urlToGet(): string;
    public function urlToPost(): string;

}