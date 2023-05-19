<?php

namespace App\Models\GraphQL\Queries\Role;


use Config\CURLRequests\CURLInstances\CURLToGraphQL;
use GraphQL\Client;
use GraphQL\Exception\QueryError;
use GraphQL\Query;

class GraphQLGettersRole
{
    /**
     * @var CURLToGraphQL
     */
    private CURLToGraphQL $curlToGraphQL;

    /**
     * @var Client
     */
    private Client $client;

    public function __construct()
    {
        $this->curlToGraphQL = new CURLToGraphQL();
        $this->client = $this->curlToGraphQL->getClient();
    }

    /**
     * @return array
     */
    public function getAllRoles(): ?array
    {
        $gql = (new Query('getAllRoles'))
            ->setSelectionSet(
                [
                    'name',
                ]
            );

        try {
            $result = $this->client->runQuery($gql);
        }
        catch (QueryError $exception) {
            // Catch query error and display error details
            log_message('error', '[ERROR] {exception} URL => {env:curltographql.baseURI}/{url}',
                ['exception' => $exception->getMessage() . " " . $exception->getTraceAsString(), 'url' => 'test']);
            exit;
        }
        return $result->getData()->getAllRoles;
    }

    /**
     * @return array
     */
    public function getRoleByName(string $name = ''): ?array
    {
        $gql = (new Query('getRoleByName'))
            ->setArguments(['name' => $name])
            ->setSelectionSet(
                [
                    'name'
                ]
            );

        try {
            $result = $this->client->runQuery($gql);
        }
        catch (QueryError $exception) {
            // Catch query error and display error details
            log_message('error', '[ERROR] {exception} URL => {env:curltographql.baseURI}/{url}',
                ['exception' => $exception->getMessage() . " " . $exception->getTraceAsString(), 'url' => 'test']);
            exit;
        }
        return $result->getData()->getAllRoles;
    }


}