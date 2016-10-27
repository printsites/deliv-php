<?php
namespace Deliv\Tests;
use Deliv\Stores;
use Deliv\Package;
use Deliv\Deliveries;

/**
 * DeliveriesTest
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
class DeliveriesTest extends \PHPUnit_Framework_TestCase
{


    public static function setUpBeforeClass()
    {

    }

    public function testDeliveriesClass()
    {

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

        $randomFirst = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
        $randomLast = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
        $customer = new \Deliv\Customer($randomFirst, $randomLast, 'PrintSites', '8105551212', TEST_EMAIL_ADDRESS, '4100 N Kedzie Ave # 2E', '', 'Chicago', 'IL', '60618');
        $package = new Package();
        $package->setName('Joes Propogands Flyers');
        $package->setPrice('49.99');
        $package->setWeight('4.0');
        $packages[] = $package;
        $ordernum = time();

        $stores = new Stores();
        $results = $stores->ListStores();
        /**
         * @var $store \Deliv\Store
         */
        foreach ($results as $store) {

            continue;
        }
        $delivery_window_id = '';
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

        foreach ($estimate->delivery_windows as $delivery_window) {
            $delivery_window_id = $delivery_window->id;
        }

        $deliveries = new Deliveries();
        $deliveries->webhook_url=TEST_WEBHOOK;
        $this->assertNull($deliveries->id, 'Deliveries id should be null');
        $deliveries->createNewDelivery($estimate, $customer, $ordernum, $delivery_window_id);
        $this->assertEquals(TEST_WEBHOOK,$deliveries->webhook_url);
        $this->assertNotNull($deliveries->id, 'Have valid delivery ID');
        $this->assertInstanceOf('Deliv\Deliveries', $deliveries);
        $this->assertInstanceOf('Deliv\Store', $deliveries->store);
        $this->assertInstanceOf('Deliv\Package', $deliveries->packages[0]);
        $this->assertInstanceOf('Deliv\TimeWindows', $deliveries->delivery_window);
        return $deliveries;
    }


    /**
     * Verify Deliv Sent Email Confirmation
     * @depends testgetCreateDelivery
     * @param $deliveries Deliveries
     */
    public function testgetDeliveryCheckEmailConfirmation($deliveries)
    {
        $error = 0;
        $maxTries = 4;
        $confirmation_success = false;
        for ($try = 1; $try <= $maxTries; $try++) {
            // your code
            $hostname = '{' . TEST_EMAIL_SERVER . ':' . TEST_EMAIL_SERVER_PORT . '/notls}INBOX';
            $username = TEST_EMAIL_ADDRESS;
            $password = TEST_EMAIL_PASSWORD;
            $inbox = imap_open($hostname, $username, $password) or $error = 1;
            $confirmation_success = false;
            if ($error != 1) {
                // Retrieve message headers
                /* grab emails */
                $emails = imap_search($inbox, 'ALL');
                /* if emails are returned, cycle through each… */
                if ($emails) {
                    /* put the newest emails on top */
                    rsort($emails);
                    foreach ($emails as $email_number) {
                        $overview = imap_fetch_overview($inbox, $email_number, 0);
                        $message = imap_fetchbody($inbox, $email_number, 1);
                        //$overview[0]->seen ? 'read' : 'unread')
                        // $overview[0]->subject
                        // $overview[0]->from
                        if (strpos($message, $deliveries->tracking_code) !== false) {
                            $confirmation_success = true;
                            $this->assertContains($deliveries->tracking_code, $message);
                            $this->assertContains($deliveries->customer->address_line_1, $message);
                            $this->assertContains($deliveries->store->name, $message);
                            imap_delete($inbox, $email_number);
                        } else if (strtotime($overview[0]->date) < strtotime("-15 days")) {
                            // Delete old messages
                            imap_delete($inbox, $email_number);
                        }
                    }
                    imap_expunge($inbox);
                    imap_errors();
                    imap_alerts();
                    imap_close($inbox);
                    if ($confirmation_success) {
                        break;
                    } else {
                        sleep(100);
                    }
                }
            }
        }
        $this->assertTrue($confirmation_success);

        return $deliveries;
    }


    /**
     * @depends testgetCreateDelivery
     * @param $deliveries Deliveries
     */
    function testretrieveDeliveryStatus($deliveries)
    {
        $retrieve_delivery= new Deliveries();
        $retrieve_delivery->retrieveDeliveryStatus($deliveries->id);
        $this->assertEquals($deliveries->store->name,$retrieve_delivery->store->name);
        $this->assertNotNull($retrieve_delivery->id, 'Have valid delivery ID');
        $this->assertInstanceOf('Deliv\Deliveries', $deliveries);
        $this->assertInstanceOf('Deliv\Store', $deliveries->store);
        $this->assertInstanceOf('Deliv\Package', $deliveries->packages[0]);
        $this->assertInstanceOf('Deliv\TimeWindows', $deliveries->delivery_window);
        return $deliveries;
    }

    /**
     * @depends testgetDeliveryCheckEmailConfirmation
     * @param $deliveries Deliveries
     */
/*
    public function testGetWebHookResult($deliveries){
        $result = file_get_contents(TEST_WEBHOOK);
        $json = json_decode($result);
    //    $this->assertTrue(is_object($json));
        return $deliveries;
    }*/


}
