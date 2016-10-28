<?php
namespace Deliv\Tests;

use Deliv\DelivClient;

/**
 * StoresTest
 *
 */
class StoresTest extends \PHPUnit_Framework_TestCase {

  public function testStores() {
      $client = new DelivClient(DELIV_API_KEY, "sandbox");

      $stores = $client->stores->listStores();
      // Ensure we get at least one back.
      $this->assertArrayHasKey("0", $stores);

      $store = end($stores);
      $this->assertAttributeNotEmpty("name", $store);

      $store = $client->stores->getStoreById($store->id);
      $this->assertAttributeNotEmpty("name", $store);

      $store = $client->stores->getStoreByAlias($store->id_alias);
      $this->assertAttributeNotEmpty("name", $store);
  }

}
