<?php
namespace Deliv\Tests;

use Deliv\DelivClient;

/**
 * DeliveryEstimateTest
 */
class DeliveryEstimateTest extends \PHPUnit_Framework_TestCase {

    public function testDeliveryEstimates()
    {
        $client = new DelivClient(DELIV_API_KEY, "sandbox");

        $date = \Deliv\Helper\Misc::formatTimestamp(strtotime("+1 day"));


        $estimate = new \stdClass();
        $estimate->store_id_alias = "0001";
        $estimate->customer_zipcode = "60618";
        $estimate->ready_by = $date;

        $estimate->packages = [
            (object) ['name' => 'asdf', 'price' => '49.99', 'weight' => '5.1'],
        ];

        $delivery_estimate = $client->delivery_estimates->createDeliveryEstimate($estimate);
        $this->assertAttributeNotEmpty("id", $delivery_estimate);
        $delivery_estimate = $client->delivery_estimates->getDeliveryEstimate($delivery_estimate->id);
        $this->assertAttributeNotEmpty("id", $delivery_estimate);

    }

}
