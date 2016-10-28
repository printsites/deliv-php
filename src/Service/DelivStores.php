<?php
namespace Deliv\Service;


class DelivStores {

    /** @var \Deliv\DelivClient */
    private $client;

    /**
     * DelivStores constructor.
     * @param \Deliv\DelivClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Returns list of stores.
     * @see http://docs.deliv.co/v2/#list-stores
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listStores($options = ['page' => 1, 'per_page' => '100'])
    {
        return $this->client->get("stores", $options);
    }

    /**
     * Returns store by id
     * @see http://docs.deliv.co/v2/#retrieve-a-store-by-id
     * @param string $id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getStoreById($id)
    {
        return $this->client->get("stores/$id", []);
    }

    /**
     * Returns store by id alias
     * @see http://docs.deliv.co/v2/#retrieve-a-store-by-id-alias
     * @param string $id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getStoreByAlias($id)
    {
        return $this->client->get("stores/id_alias/$id", []);
    }
}
