<?php
namespace Deliv;
/**
 * Class Event
 *
 * Used to Create deliveries, check status of delivery, make changes to deliveries
 * Fundamentally, a delivery is a transaction to request that Deliv move packages from a store to a customer.
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @package Deliv
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
class Event extends DelivAPI
{
    public $event; //String
    public $created_at; //Date
    /**
     * @var Deliveries $delivery
     */
    public $delivery; //Delivery
    public $fetch; //Delivery

    /**
     * Event constructor. Parses json from webhook fire to Deliv Object
     * @param string $payload json string from webook payload
     */
    public function __construct($payload = '')
    {
        $response = json_decode($payload);
        switch(explode('.',$response->event)[0]){
            case "delivery":
                $this->fill($response);
                $deliveries = new Deliveries();
                $deliveries->parseDeliveryStatus($response->delivery);
                $this->delivery = $deliveries;
                break;
            case "fetch":

                break;
        }

    }


}