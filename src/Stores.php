<?php
/**
 * Copyright (c) 2016
 */

/**
 * User: Joseph Jozwik
 * Date: 6/22/2016
 */

namespace Deliv;

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
   * @return array
   */
  public function ListStores($page=1,$per_page=50){

    $client = self::getDelivClient();
    
    $response = $client->get('stores');
   // $stores[] = new Store($id, $id_alias, $name, $phone, $suite_number, $address_line_1, $address_line_2, $address_city, $address_state, $address_zipcode, $type, $offers_delivery, $offers_fetches, $metro_id);
    return $response;
  }

}