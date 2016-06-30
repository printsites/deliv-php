<?php
/**
 * Copyright (c) 2016 PrintSites
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Deliv\Stores;
use Deliv\Store;
use Deliv\Package;
use Deliv\TimeWindows;
use Deliv\Deliveries;


/**
 * User: Joseph Jozwik
 * Date: 6/30/2016
 */
class DeliveriesTest extends PHPUnit_Framework_TestCase
{


    public static function setUpBeforeClass()
    {

    }

    public function testDeliveriesClass(){

        $deliveries = new Deliveries();
        $this->expectException(\Exception::class);
        $deliveries->setCustomerSignatureType('bana');

    }
    /**
     * Base Create Delivery No Restrictions on recipient at or signature requirement.
     * @return Deliveries
     */
    public function testgetCreateDelivery()
    {

        $customer = new \Deliv\Customer('Joseph','Jozwik','PrintSites','8105551212','jjozwik@printsites.com','4100 N Kedzie Ave # 2E','','Chicago','IL','60618');
        $package = new Package();
        $package->setName('Joes Propogands Flyers');
        $package->setPrice('49.99');
        $package->setWeight('4.0');
        $packages[] = $package;
        $ordernum=time();

        $stores = new Stores();
        $results = $stores->ListStores();
        /**
         * @var $store \Deliv\Store
         */
        foreach ($results as $store) {

            continue;
        }
        $delivery_window_id='';
        // Send ready by in 3 hours
        $ready_by = date('Y-m-d\TH:i:s.Z\Z', strtotime("+3 hours"));
        $customer_zip = $store->getAddressZipcode();
        $deliverEstimate = new \Deliv\DeliveryEstimate();
        $estimate = $deliverEstimate->getDeliveryEstimate($store->getId(), $customer_zip, $ready_by, $packages);

        $this->assertInstanceOf('Deliv\Store', $estimate->store);
        $this->assertInstanceOf('Deliv\Package', $estimate->packages[0]);
        $this->assertInstanceOf('Deliv\TimeWindows', $estimate->delivery_windows[0]);

        foreach($estimate->delivery_windows as $delivery_window){
            $delivery_window_id = $delivery_window->id;
        }

        $deliveries= new Deliveries();
        $this->assertNull($deliveries->id, 'Deliveries id should be null');
        $deliveries->createNewDelivery($estimate,$customer,$ordernum,$delivery_window_id);
        $this->assertNotNull($deliveries->id,'Have valid delivery ID');
        $this->assertInstanceOf('Deliv\Deliveries', $deliveries);
        $this->assertInstanceOf('Deliv\Store', $deliveries->store);
        $this->assertInstanceOf('Deliv\Package', $deliveries->packages[0]);
        $this->assertInstanceOf('Deliv\TimeWindows', $deliveries->delivery_window);
        return $deliveries;
    }

    /**
     * @depends testgetCreateDelivery
     */

    public function testgetDeliveryStatus($deliveries){



    }

}
