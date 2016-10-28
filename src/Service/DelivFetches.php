<?php
namespace Deliv\Service;


class DelivFetches {

    /** @var \Deliv\DelivClient */
    private $client;

    /**
     * DelivFetches constructor.
     * @param \Deliv\DelivClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Create
     * @see http://docs.deliv.co/v2/#create-a-new-fetches
     * @param \stdClass $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createFetches(\stdClass $data)
    {
        return $this->client->post("fetches", $data);
    }

    /**
     * Returns fetches by id
     * @see http://docs.deliv.co/v2/#retrieve-a-fetches
     * @param string $id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFetches($id)
    {
        return $this->client->get("fetches/$id", []);
    }

    /**
     * Returns list of fetches
     * @see http://docs.deliv.co/v2/#list-fetches
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listFetches($options = [])
    {
        $options += [
            'page' => "1",
            'per_page' => "100",
        ];

        return $this->client->get("fetches", $options);
    }

    /**
     * Update Fetches
     * @see http://docs.deliv.co/v2/#update-a-fetches
     * @param \stdClass $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateFetches(\stdClass $data)
    {
        return $this->client->put("fetches/$data->id", $data);
    }

    /**
     * cancel Fetches
     * @see http://docs.deliv.co/v2/#fetches
     * @param string $id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteFetches($id)
    {
        return $this->client->delete("fetches/$id");
    }

}
