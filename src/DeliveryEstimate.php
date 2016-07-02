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
namespace Deliv;

/**
 * Used to pull delivery estimates from Deliv
 * 
 * Class DeliveryEstimate
 * @package Deliv
 */
class DeliveryEstimate extends DelivAPI {

  public function __construct() {

  }


  /**
   * @param int $store_id
   * @param string $customer_zipcode
   * @param string $ready_by iso 8601 form like 2016-06-30T22:23:00Z
   * @param array $packages
   * @return Estimate|null
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
    /**
     * @var Estimate $estimate
     */
    $estimate = new Estimate($response);

    return $estimate;
  }

  /**
   * Returns DeliveryEstimate from previous $estimate_id
   *
   * @param $estimate_id
   * @return Estimate|null
   */
  public function retrieveDeliveryEstimate($estimate_id) {

    $client = self::getDelivClient();
    $response = $client->get('delivery_estimates/' . $estimate_id);
    /**
     * @var Estimate $estimate
     */
    $estimate = new Estimate($response);

    return $estimate;

  }

}
