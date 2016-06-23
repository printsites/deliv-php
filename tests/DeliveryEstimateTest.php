<?php

require_once __DIR__.'/../vendor/autoload.php';
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
    foreach($results as $store) {

      continue;
    }
    $ready_by='2014-01-29T01:35:08Z';
    $customer_zip=$store->getAddressZipcode();
    $deliverEstimate = new \Deliv\DeliveryEstimate();
    $estimate = $deliverEstimate->getDeliveryEstimate($store->getId(),$customer_zip,$ready_by,$packages);
    

  }


  }
