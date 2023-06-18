<?php

namespace Config\CURLRequests\CURLToLocalhost;

use CodeIgniter\HTTP\Response;
use Config\CURLRequest;

abstract class CURLToCreator
{
    abstract public function factoryMethod(): CURLTo;

    /**
     * @param string $method
     * @param CURLRequest $curl
     * @param object $data
     * @return array
     */
    public function doRequest(string $method, CURLRequest $curl, object $data): array
    {

        $curlTo = $this->factoryMethod();
        $response["result"] = false;
        $response["status"] = 500;
        switch (strtolower($method)) {
            case 'get':
                $response = $curl->client->get($curlTo->urlToGet());
                break;
            case 'post':
                try {
                    $response = $curl->client->request('post', $curlTo->urlToPost(), [
                        'json' => $data]);
                    return $this->getResponseData($response);

                } catch (\Exception $e) {
                    log_message('error', '[ERROR] {exception} {env:curltolocalhost.baseURI}/{url} ',
                        ['exception' => $e, 'url' => $curlTo->urlToPost()]);
                }
                break;
            default:
                break;
        }
        return $response;
    }

    /**
     * @param Response $response
     * @return array
     */
    private function getResponseData(Response $response): array
    {
        $resp["result"] = true;
        $resp["status"] = $response->getStatusCode();
        $resp["body"] = json_decode($response->getBody());
        return $resp;

    }

}