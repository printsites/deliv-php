<?php
namespace Deliv;
/**
 * Stores
 *
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
class Stores extends DelivAPI {
  /**
   * ListStores
   *
   * Returns a paginated set of stores associated with your account.
   *
   * @example $ curl -X GET https://api.deliv.co/v2/stores --header "Api-Key:YOURKEYHERE" -d per_page=50
   * @param int $page (Optional)
   * @param int $per_page (Optional) 1-100. Default is 25.
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
   * getStoreByIDAlias
   *
   * Retrieves the details for a store.
   *
   * @param string $id_alias (Required) The id of the store
   * @return $this Store
   */
  public function getStoreByIDAlias($id_alias = '49d09') {
    $client = self::getDelivClient();
    $response = $client->get('stores/id_alias/' . $id_alias);
    return (new Store())->fill($response);
  }

}