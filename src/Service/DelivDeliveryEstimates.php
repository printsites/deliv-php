<?php
namespace Deliv\Service;


class DelivDeliveryEstimates {

    /** @var \Deliv\DelivClient */
    private $client;

    /**
     * DelivDeliveryEstimates constructor.
     * @param \Deliv\DelivClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Create
     * @see http://docs.deliv.co/v2/#create-a-delivery-estimate
     * @param \stdClass $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createDeliveryEstimate(\stdClass $data)
    {
        return $this->client->post("delivery_estimates", $data);
    }

    /**
     * Retrieve
     * @see http://docs.deliv.co/v2/#retrieve-a-delivery-estimate
     * @param string $id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDeliveryEstimate($id)
    {
        return $this->client->get("delivery_estimates/$id", []);
    }

}
