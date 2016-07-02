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

/**
 * Class StoresTest
 * @package Deliv\Tests
 */
class StoresTest extends \PHPUnit_Framework_TestCase {

  public static function setUpBeforeClass() {

  }

  /**
   * @return \Deliv\Store
   */
  public function testListStores() {

    $stores = new Stores();
    $results = $stores->ListStores();
    /**
     * @var $store \Deliv\Store
     */
    foreach ($results as $store) {
      $this->assertInstanceOf('Deliv\Store', $store);
    }

    return $store;
  }

  /**
   * @depends testListStores
   * @param $store \Deliv\Store
   */
  public function testgetStoreByIDAlias($store) {
    $stores = new Stores();
    $retrivedStore = $stores->getStoreByIDAlias($store->getIdAlias());
    $this->assertInstanceOf('Deliv\Store', $retrivedStore);
  }
}
