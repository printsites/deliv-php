<?php
namespace Deliv\Tests;
use Deliv\Stores;
use Deliv\Package;
use Deliv\Event;


/**
 * EventTest
 *
 * Tests mock json payloads from Deliv webhook events
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
class EventTests extends \PHPUnit_Framework_TestCase {

    public static function setUpBeforeClass() {

    }


    public function testDeliveryAssigned() {
        $json = file_get_contents(__DIR__.'/data/delivery.assigned.json');
        $event =  new Event($json);
        $this->assertEquals('delivery.assigned', $event->event);
        $this->assertEquals('assigned', $event->delivery->status);
        $this->assertInstanceOf('Deliv\Store', $event->delivery->store);
        $this->assertInstanceOf('Deliv\Package', $event->delivery->packages[0]);
        $this->assertInstanceOf('Deliv\Driver', $event->delivery->driver);
        $this->assertInstanceOf('Deliv\TimeWindows', $event->delivery->delivery_window);
    }


    public function testDeliveryInTransitEvent() {
        $json = file_get_contents(__DIR__.'/data/delivery.in_transit.json');
        $event =  new Event($json);
        $this->assertEquals('delivery.in_transit', $event->event);
        $this->assertEquals('in_transit', $event->delivery->status);
        $this->assertInstanceOf('Deliv\Store', $event->delivery->store);
        $this->assertInstanceOf('Deliv\Package', $event->delivery->packages[0]);
        $this->assertInstanceOf('Deliv\Driver', $event->delivery->driver);
        $this->assertInstanceOf('Deliv\TimeWindows', $event->delivery->delivery_window);
    }


    public function testDeliveryDelivered() {
        $json = file_get_contents(__DIR__.'/data/delivery.delivered.json');
        $event =  new Event($json);
        $this->assertEquals('delivery.delivered', $event->event);
        $this->assertEquals('delivered', $event->delivery->status);
        $this->assertNotNull($event->delivery->delivered_at);
        $this->assertInstanceOf('Deliv\Store', $event->delivery->store);
        $this->assertInstanceOf('Deliv\Package', $event->delivery->packages[0]);
        $this->assertInstanceOf('Deliv\Driver', $event->delivery->driver);
        $this->assertInstanceOf('Deliv\TimeWindows', $event->delivery->delivery_window);
    }

    /**
     * Test returned to origin devlivery response.
     */
    public function testDeliveryReturned() {
        $json = file_get_contents(__DIR__.'/data/delivery.returned.json');
        $event =  new Event($json);
        $this->assertEquals('delivery.returned', $event->event);
        $this->assertEquals('returned', $event->delivery->status);
        $this->assertNull($event->delivery->delivered_at);
        $this->assertInstanceOf('Deliv\Store', $event->delivery->store);
        $this->assertInstanceOf('Deliv\Package', $event->delivery->packages[0]);
        $this->assertInstanceOf('Deliv\Driver', $event->delivery->driver);
        $this->assertInstanceOf('Deliv\TimeWindows', $event->delivery->delivery_window);
    }


}
