<?php
namespace Deliv\Service;


class DelivDeliveries {

    /** @var \Deliv\DelivClient */
    private $client;

    /**
     * DelivDeliveries constructor.
     * @param \Deliv\DelivClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Create
     * @see http://docs.deliv.co/v2/#create-a-new-delivery
     * @param \stdClass $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createDelivery(\stdClass $data)
    {
        return $this->client->post("deliveries", $data);
    }

    /**
     * Returns delivery by id
     * @see http://docs.deliv.co/v2/#retrieve-a-delivery
     * @param string $id
     * @param bool $expand
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDelivery($id, $expand = TRUE)
    {
        $query = [];
        if ($expand) {
            $query['expand'] = 1;
        }
        return $this->client->get("deliveries/$id", $query);
    }

    /**
     * Returns list of deliveries
     * @see http://docs.deliv.co/v2/#list-deliveries
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listDeliveries($options = [])
    {
        $options += [
            'page' => "1",
            'per_page' => "100",
        ];

        return $this->client->get("deliveries", $options);
    }

    /**
     * Update Delivery
     * @see http://docs.deliv.co/v2/#update-a-delivery
     * @param mixed $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateDelivery($data)
    {
        return $this->client->put("deliveries/$data->id", $data);
    }

    /**
     * Cancel Delivery
     * @see http://docs.deliv.co/v2/#cancel-a-delivery
     * @param string $id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancelDelivery($id)
    {
        return $this->client->delete("deliveries/$id");
    }

}
