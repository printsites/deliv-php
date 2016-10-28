<?php
namespace Deliv\Service;


class DelivFetchEstimates {

    /** @var \Deliv\DelivClient */
    private $client;

    /**
     * DelivFetchEstimates constructor.
     * @param \Deliv\DelivClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Create
     * @see http://docs.deliv.co/v2/#create-a-fetch-estimate
     * @param \stdClass $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createFetchEstimate(\stdClass $data)
    {
        return $this->client->post("fetch_estimates", $data);
    }

    /**
     * Retrieve
     * @see http://docs.deliv.co/v2/#retrieve-a-fetch-estimate
     * @param string $id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFetchEstimate($id)
    {
        return $this->client->get("fetch_estimates/$id", []);
    }

}
