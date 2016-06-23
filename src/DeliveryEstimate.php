<?php
/**
 * Copyright (c) 2016 PrintSites
 */

namespace Deliv;

/**
 * Class DeliveryEstimate
 *
 * @package Deliv
 */
class DeliveryEstimate extends DelivAPI {

  public function __construct() {

  }

  /**
   * @param int $store_id
   * @param string $customer_zipcode
   * @param string $ready_by
   * @param array $packages
   * @return mixed
   */
  public function getDeliveryEstimate($store_id = 0, $customer_zipcode = '48843', $ready_by = '2014-01-29T01:35:08Z', $packages = array()) {

    $client = self::getDelivClient();
    $response = $client->post('delivery_estimates', [
      'json' => [
        'store_id' => $store_id,
        'customer_zipcode' => $customer_zipcode,
        'ready_by' => $ready_by,
        'packages' => $packages
      ]
    ]);
    //Recast Responses to SDK Models
    $delivery_windows = array();
    foreach ($response->delivery_windows as $window) {
      $delivery_windows[] = (new TimeWindows())->fill($window);
    }
    $response->delivery_windows = $delivery_windows;
    foreach ($response->packages as $package) {
      $packages[] = (new Package())->fill($package);
    }
    $response->packages = $packages;
    $response->store = (new Store())->fill($response->store);
    return $response;
  }

}
