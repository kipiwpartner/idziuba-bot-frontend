<?php

namespace Config\CURLRequests\CURLInstances;

use GraphQL\Client;

class CURLToGraphQL
{
    /**
     * @var Client
     */
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(
            env('curltographql.baseURI') . '/test',
            //headers
            [
                'Authorization' => 'Bearer JKLGIFRhg4875thsfgdv9clNUKOYFRe978tryfsd9vhywp9r'
            ]
        );
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}
