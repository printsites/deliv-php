<?php
namespace Deliv;
/**
 * 
 */
class DeliveryEstimate extends DelivAPI {
    
    public function __construct() {
       
    }

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

        return $response;
    }


}
