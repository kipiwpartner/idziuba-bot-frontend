<?php

namespace Config\CURLRequests\CURLInstances;

use GraphQL\Client;
use GraphQL\Exception\QueryError;
use GraphQL\Query;
use GraphQL\Results;

class CURLToGraphQL
{
    /**
     * @var Client
     */
    public Client $client;

    public function __construct()
    {
        $this->client = new Client(
            'http://localhost:3003/test',
            [
//                'User-Agent' => $this->userAgent,
//                'Accept'     => 'application/json',
//                'Content-Type' => 'application/json',
//                'cache-control' => 'no-cache',
                'Authorization' => 'Bearer JKLGIFRhg4875thsfgdv9clNUKOYFRe978tryfsd9vhywp9r'
            ]  // Replace with array of extra headers to be sent with request for auth or other purposes
        );
    }

    /**
     * @return Results
     */
    public function getAllRoles(): Results
    {
        $gql = (new Query('allRoles'))
            ->setSelectionSet(
                [
                    'name',
                ]
            );

        try {
            $results = $this->client->runQuery($gql);
        }
        catch (QueryError $exception) {
            // Catch query error and display error details
            log_message('error', '[ERROR] {exception} {env:curltolocalhost.baseURI}/{url} ',
                ['exception' => $exception->getErrorDetails(), 'url' => '/test']);
            exit;
        }

        return $results;
    }
}
