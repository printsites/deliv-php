<?php
namespace Deliv\Tests;
use Deliv\Stores;

/**
 * StoresTest
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
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
