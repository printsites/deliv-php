<?php
/**
 * Copyright (c) 2016
 */
require_once __DIR__.'/../vendor/autoload.php';
/**
 * User: Joseph Jozwik
 * Date: 6/22/2016
 */
use Deliv\Stores;
class StoresTest extends PHPUnit_Framework_TestCase {

  public static function setUpBeforeClass() {

  }

  public function testListStores()
  {

    $stores = new Stores();
    $results = $stores->ListStores();
    /**
     * @var $store \Deliv\Store
     */
    foreach($results as $store){
      $this->assertInstanceOf('Deliv\Store',$store);
    }

    return $store;
  }

  /**
   * @depends testListStores
   * @param $store \Deliv\Store
   */
  public function testgetStoreByIDAlias($store){
    $stores = new Stores();
    $retrivedStore =$stores->getStoreByIDAlias($store->getIdAlias());
    $this->assertInstanceOf('Deliv\Store',$retrivedStore);
  }
}
