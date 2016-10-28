<?php

namespace Deliv;

use Deliv\Helper\ResourceMap;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use function GuzzleHttp\Psr7\stream_for;

class DelivClient
{
    /** @var Client $http_client */
    private $http_client;

    /** @var string api key */
    protected $apiKey;

    /** @var string API environment */
    protected $environment;

    /** @var string baseUrl */
    protected $baseUrl;

    /** @var Service\DelivStores $stores */
    public $stores;

    /** @var Service\DelivDeliveryEstimates $delivery_estimates */
    public $delivery_estimates;

    /** @var Service\DelivDeliveries $deliveries */
    public $deliveries;

    /** @var Service\DelivFetchEstimates $fetch_estimates */
    public $fetch_estimates;

    /** @var Service\DelivFetches $fetches */
    public $fetches;

    /**
     * IntercomClient constructor.
     * @param string $apiKey Deliv API Key
     * @param string $environment Deliv environment. Either sandbox or production.
     */
    public function __construct($apiKey, $environment = "production")
    {
        $this->setDefaultClient();

        $this->stores = new Service\DelivStores($this);
        $this->delivery_estimates = new Service\DelivDeliveryEstimates($this);
        $this->deliveries = new Service\DelivDeliveries($this);
        $this->fetch_estimates = new Service\DelivFetchEstimates($this);
        $this->fetches = new Service\DelivFetches($this);

        $this->apiKey = $apiKey;
        $this->environment = $environment;

        if ($environment == "production") {
            $this->baseUrl = "https://api.deliv.co/v2";
        } else {
            $this->baseUrl = "https://api-sandbox.deliv.co/v2";
        }

    }

    private function setDefaultClient()
    {
        $this->http_client = new Client();
    }

    /**
     * Sets GuzzleHttp client.
     * @param Client $client
     */
    public function setClient($client)
    {
        $this->http_client = $client;
    }

    /**
     * Sends POST request to Deliv API.
     * @param string $endpoint
     * @param string $json
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($endpoint, $json)
    {
        $response = $this->http_client->request('POST',
            "$this->baseUrl/$endpoint", [
                'json' => $json,
                'headers' => [
                    'Accept' => 'application/json',
                    'Api-Key' => $this->apiKey,
                ]
            ]);
        return $this->handleResponse($response);
    }

    /**
     * Sends PUT request to Deliv API.
     * @param string $endpoint
     * @param string $json
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function put($endpoint, $json)
    {
        $response = $this->http_client->request('PUT',
            "$this->baseUrl/$endpoint", [
                'json' => $json,
                'headers' => [
                    'Accept' => 'application/json',
                    'Api-Key' => $this->apiKey,
                ]
            ]);
        return $this->handleResponse($response);
    }

    /**
     * Sends DELETE request to Deliv API.
     * @param string $endpoint
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($endpoint)
    {
        $response = $this->http_client->request('DELETE',
            "$this->baseUrl/$endpoint", [
                'headers' => [
                    'Accept' => 'application/json',
                    'Api-Key' => $this->apiKey,
                ]
            ]);
        return $this->handleResponse($response);
    }

    /**
     * @param string $endpoint
     * @param string $query
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($endpoint, $query)
    {
        $response = $this->http_client->request('GET',
            "$this->baseUrl/$endpoint", [
                'query' => $query,
                'headers' => [
                    'Accept' => 'application/json',
                    'Api-Key' => $this->apiKey,
                ]
            ]);
        return $this->handleResponse($response);
    }

    /**
     * @param Response $response
     * @return mixed
     */
    private function handleResponse(Response $response)
    {
        $stream = stream_for($response->getBody());
        $raw_response = json_decode($stream->getContents());

        //
        // We parse the response into resources.
        if (is_object($raw_response)) {
            if (isset($raw_response->object)) {
                $resource = $raw_response->object;
            } else {
                // For some reason stores don't have this attribute.
                $resource = "store";
            }
            return ResourceMap::resourceFactory($raw_response, $resource);
        } elseif (is_array($raw_response)) {
            $list = [];
            foreach ($raw_response as $item) {
                if (isset($raw_response->object)) {
                    $resource = $raw_response->object;
                } else {
                    // For some reason stores don't have this attribute.
                    $resource = "store";
                }
                $list[] = ResourceMap::resourceFactory($item, $resource);
            }
            return $list;
        } else {
            return $raw_response;
        }
    }
}
