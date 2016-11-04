<?php
namespace Deliv\Tests;

use Deliv\DelivClient;


/**
 * DeliveriesTest
 */
class DeliveriesTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return mixed
     */
    public function testDeliveryEstimateCreate()
    {
        $client = new DelivClient(DELIV_API_KEY, "sandbox");

        $estimate = \Deliv\Resource\DeliveryEstimate::factory("0001");
        $estimate->customer_zipcode = "60618";
        $package = \Deliv\Resource\Package::factory();
        $package->name = "asdfasdf";
        $package->price = "49.99";
        $package->SKU = "abcdefgt";
        $estimate->packages = [$package];
        $delivery_estimate = $client->delivery_estimates->createDeliveryEstimate($estimate);
        $this->assertAttributeNotEmpty("id", $delivery_estimate);

        return $delivery_estimate;
    }

    /**
     * @depends testDeliveryEstimateCreate
     */
    public function testDeliveryEstimateGet()
    {
        $client = new DelivClient(DELIV_API_KEY, "sandbox");

        $args = func_get_args();
        /* @var \Deliv\Resource\DeliveryEstimate $delivery_estimate */
        $delivery_estimate = $args[0];

        $delivery_estimate = $client->delivery_estimates->getDeliveryEstimate($delivery_estimate->id);
        $this->assertAttributeNotEmpty("id", $delivery_estimate);

        return $delivery_estimate;
    }

    /**
     * @depends testDeliveryEstimateGet
     */
    public function testDeliveryCreate()
    {
        $client = new DelivClient(DELIV_API_KEY, "sandbox");
        $args = func_get_args();
        /* @var \Deliv\Resource\DeliveryEstimate $delivery_estimate */
        $delivery_estimate = $args[0];
        $delivery = \Deliv\Resource\Delivery::factory($delivery_estimate->delivery_windows[0]->id, $delivery_estimate->store->id_alias);
        $delivery->order_reference = "12345";
        $delivery->customer = \Deliv\Resource\Customer::factory();
        $delivery->customer->first_name = "Matt";
        $delivery->customer->last_name = "Wisner";
        $delivery->customer->phone = "2312251102";
        $delivery->customer->address_line_1 = "3127 N Drake Ave";
        $delivery->customer->address_city = "Chicago";
        $delivery->customer->address_state = "IL";
        $delivery->customer->address_zipcode = "60618";
        $package = \Deliv\Resource\Package::factory();
        $package->name = "asdfasdf";
        $package->price = "49.99";
        $package->SKU = "abcdefgt";
        $delivery->packages = [$package];
        $delivery = $client->deliveries->createDelivery($delivery);
        $this->assertAttributeNotEmpty("id", $delivery);

        return $delivery;

    }

    /**
     * @depends testDeliveryCreate
     */
    public function testDeliveryGet()
    {
        $client = new DelivClient(DELIV_API_KEY, "sandbox");
        $args = func_get_args();
        /* @var \Deliv\Resource\Delivery $delivery */
        $delivery = $args[0];

        $delivery_got = $client->deliveries->getDelivery($delivery->id);
        $this->assertAttributeNotEmpty("id", $delivery_got);

        return $delivery_got;
    }

    /**
     * @depends testDeliveryGet
     */
    public function testDeliveryList()
    {
        $client = new DelivClient(DELIV_API_KEY, "sandbox");
        $deliveries = $client->deliveries->listDeliveries();
        // Ensure we get at least one back.
        $this->assertArrayHasKey("0", $deliveries);

        $delivery = end($deliveries);
        $this->assertAttributeNotEmpty("id", $delivery);

    }

    /**
     * @depends testDeliveryGet
     * @depends testDeliveryList
     */
    public function testDeliveryUpdate()
    {
        $client = new DelivClient(DELIV_API_KEY, "sandbox");

        $args = func_get_args();
        /* @var \Deliv\Resource\Delivery $delivery */
        $delivery = $args[0];
        $delivery->alt_id_1 = "Hallo";

        $delivery = $client->deliveries->updateDelivery($delivery);

        $this->assertAttributeEquals("Hallo", "alt_id_1", $delivery);
        return $delivery;
    }

    /**
     * @depends testDeliveryUpdate
     */
    public function testDeliveryCancel()
    {
        $client = new DelivClient(DELIV_API_KEY, "sandbox");
        $args = func_get_args();
        /* @var \Deliv\Resource\Delivery $delivery */
        $delivery = $args[0];

        $client->deliveries->cancelDelivery($delivery->id);

        $delivery_got = $client->deliveries->getDelivery($delivery->id);
        $this->assertAttributeEquals("canceled", "status", $delivery_got);
    }
}
