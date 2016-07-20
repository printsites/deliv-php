<?php
namespace Deliv\Tests;
use Deliv\Customer;
use Deliv\Estimate;
use Deliv\Stores;
use Deliv\Package;


/**
 * DeliveryEstimateTest
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
class DeliveryEstimateTest extends \PHPUnit_Framework_TestCase {

  public static function setUpBeforeClass() {

  }


  /**
   * @param Estimate $estimate
   */
  public function testCalculateDistance() {

    $stores = new Stores();
    $results = $stores->ListStores();
    /**
     * @var \Deliv\Store $store
     */
    foreach ($results as $store) {

      continue;
    }


    $customer = new Customer();
    $customer->address_line_1='240 N. Fenway Dr.';
    $customer->address_city='Fenton';
    $customer->address_state='MI';
    $customer->address_zipcode='48430';
    $deliverEstimate = new \Deliv\DeliveryEstimate();

    $distance1 = $deliverEstimate->calculate_distance($store,$customer);
    $this->assertTrue(is_float($distance1));

    // Test distances with only zipcode
    $customer = new Customer();
    $customer->address_zipcode='48430';
    $deliverEstimate = new \Deliv\DeliveryEstimate();

    $distance2 = $deliverEstimate->calculate_distance($store,$customer);
    $this->assertTrue(is_float($distance2));

  return $store;
  }

  /**
   * @depends testCalculateDistance
   * @return \Deliv\Estimate|null
   */
  public function testgetDeliveryEstimate($store) {

    $package = new Package();
    $package->setName('Joes Propogands Flyers');
    $package->setPrice('49.99');
    $package->setWeight('4.0');
    $packages[] = $package;



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
   * @return \Deliv\Estimate|null
   */
  public function testgetDeliveryEstimateFarinAdvance() {

    $package = new Package();
    $package->setName('Joes Propogands Flyers');
    $package->setPrice('49.99');
    $package->setWeight('4.0');
    $packages[] = $package;

    $stores = new Stores();
    $results = $stores->ListStores();
    /**
     * @var \Deliv\Store $store
     */
    foreach ($results as $store) {

      continue;
    }

    // Send ready by in 3 hours

    $default_tz = date_default_timezone_get();
    date_default_timezone_set('UTC');
    $ready_by = date('Y-m-d\TH:i:s\Z', strtotime("+3 months"));
    date_default_timezone_set($default_tz);

    $customer_zip = $store->getAddressZipcode();
    $deliverEstimate = new \Deliv\DeliveryEstimate();
    $estimate = $deliverEstimate->getDeliveryEstimate($store->getId(), $customer_zip, $ready_by, $packages);

    $this->assertInstanceOf('Deliv\Store', $estimate->store);
    $this->assertInstanceOf('Deliv\Package', $estimate->packages[0]);
    $this->assertInstanceOf('Deliv\TimeWindows', $estimate->delivery_windows[0]);

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
