<?php
/**
 * Copyright (c) 2016 PrintSites
 * User: Joseph Jozwik
 * Date: 6/30/2016
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @since 1.0
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
namespace Deliv\Tests;
require_once __DIR__ . '/../vendor/autoload.php';

use Deliv\Stores;
use Deliv\Package;

/**
 * Class DeliveryEstimateTest
 * @package Deliv\Tests
 */
class DeliveryEstimateTest extends \PHPUnit_Framework_TestCase {

  public static function setUpBeforeClass() {

  }

  /**
   * @return \Deliv\Estimate|null
   */
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
    
    $default_tz = date_default_timezone_get();
    date_default_timezone_set('UTC');
    $ready_by = date('Y-m-d\TH:i:s\Z', strtotime("+3 hours"));
    date_default_timezone_set($default_tz);

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
