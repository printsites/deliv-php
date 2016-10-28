<?php
namespace Deliv\Tests;

use Deliv\DelivClient;
use PHPUnit\Framework\TestCase;

/**
 * DeliveryEstimateTest
 */
class DeliveryEstimateTest extends TestCase
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
    }

}
