<?php

require_once __DIR__ . '/../vendor/autoload.php';
/**
 * User: Joseph Jozwik
 * Date: 6/22/2016
 */
use Deliv\Stores;
use Deliv\Store;
use Deliv\Package;
use Deliv\TimeWindows;

class DeliveryEstimateTest extends PHPUnit_Framework_TestCase {

  public static function setUpBeforeClass() {

  }

  public function testgetDeliveryEstimate() {

    $package = new Package();
    $package->setName('Joes Propogands Flyers');
    $package->setPrice('49.99');
    $package->setWeight('4.0');
    $packages[] = $package;

    $stores = new Stores();
    $results = $stores->ListStores();
    /**
     * @var $store \Deliv\Store
     */
    foreach ($results as $store) {

      continue;
    }

    // Send ready by in 3 hours
    $ready_by = date('Y-m-d\TH:i:s.Z\Z', strtotime("+3 hours"));
    $customer_zip = $store->getAddressZipcode();
    $deliverEstimate = new \Deliv\DeliveryEstimate();
    $estimate = $deliverEstimate->getDeliveryEstimate($store->getId(), $customer_zip, $ready_by, $packages);

    $this->assertInstanceOf('Deliv\Store', $estimate->store);
    $this->assertInstanceOf('Deliv\Package', $estimate->packages[0]);
    $this->assertInstanceOf('Deliv\TimeWindows', $estimate->delivery_windows[0]);
    $this->assertInstanceOf('Deliv\TimeWindows', $estimate->unavailable_windows[0]);
    return $estimate;
  }

  /**
   * @depends testgetDeliveryEstimate
   * @param $estimate
   */
  public function testretrieveDeliveryEstimate($estimate) {

    $this->assertNotNull($estimate->id);

    $deliverEstimate = new \Deliv\DeliveryEstimate();
    $retrievedEstimate = $deliverEstimate->retrieveDeliveryEstimate($estimate->id);

    $this->assertInstanceOf('Deliv\Store', $retrievedEstimate->store);
    $this->assertInstanceOf('Deliv\Package', $retrievedEstimate->packages[0]);
    $this->assertInstanceOf('Deliv\TimeWindows', $retrievedEstimate->delivery_windows[0]);

  }

}
