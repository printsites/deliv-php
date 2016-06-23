<?php
/**
 * Copyright (c) 2016
 */
include '../vendor/autoload.php';
/**
 * User: Joseph Jozwik
 * Date: 6/22/2016
 */
use Deliv\Stores;
class StoresTest extends PHPUnit_Framework_TestCase {

  public static function setUpBeforeClass() {
    define('DELIV_API_KEY','0788494431f585b5a6281540c50175b99be4');
  }

  public function testListStores()
  {

    $stores = new Stores();
    $results = $stores->ListStores();

    foreach($results as $store){

      $this->assertInstanceOf('Deliv\Store',$store);
    }


  }
}
