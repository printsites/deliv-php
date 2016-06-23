<?php
/**
 * Copyright (c) 2016
 */

/**
 * User: Joseph Jozwik
 * Date: 6/22/2016
 */

namespace Deliv;
use Deliv\Store;

class Stores extends DelivAPI {

  /**
   * @param int $page
   * @param int $per_page
   * $ curl -X GET https://api.deliv.co/v2/stores --header "Api-Key:YUIO23edjklDSSA" -d per_page=50
   *
   */

  /**
   * @param int $page
   * @param int $per_page
   * @return array Stores
   */
  public function ListStores($page = 1, $per_page = 50) {

    $client = self::getDelivClient();

    $response = $client->get('stores', array(
      'page' => $page,
      'per_page' => $per_page
    ));
    foreach ($response as $store) {
      $stores[] = (new Store())->fill($store);
    }
    return $stores;
  }

  /**
   * @param string $id_alias
   * @return $this Store
   */
  public function getStoreByIDAlias($id_alias='49d09'){
    $client = self::getDelivClient();
    $response = $client->get('stores/id_alias/'.$id_alias);
    return (new Store())->fill($response);
  }

}