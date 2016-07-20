<?php
namespace Deliv;

use GuzzleHttp;

/**
 * Used to pull delivery estimates from Deliv
 *
 * Delivery Estimates are used to validate address information, as well as get currently
 * available delivery windows for a delivery. Delivery Estimates also ensure that the
 * Deliv service is currently servicing that metro area. For these reasons, a Delivery
 * Estimate should be created in advance of creating an actual Delivery.
 *
 * Copyright (c) 2016 PrintSites
 * User: Joseph Jozwik
 * Date: 6/30/2016
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
class DeliveryEstimate extends DelivAPI
{

    public function __construct()
    {

    }

    /**
     * @param int $store_id
     * @param string $customer_zipcode
     * @param string $ready_by iso 8601 form like 2016-06-30T22:23:00Z
     * @param array $packages
     * @return Estimate|null
     */
    public function getDeliveryEstimate($store_id = 0, $customer_zipcode = '48843', $ready_by = '2014-01-29T01:35:08Z', $packages = array())
    {

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
    public function retrieveDeliveryEstimate($estimate_id)
    {

        $client = self::getDelivClient();
        $response = $client->get('delivery_estimates/' . $estimate_id);
        /**
         * @var Estimate $estimate
         */
        $estimate = new Estimate($response);

        return $estimate;

    }

    /**
     * Calculate and return the distance in miles between the origin and destination.
     * Best practice recommendation from Deliv is to pre-qualify address. Anything under 25 miles
     * move on to an estimate
     *
     * @param Store $store origin store of the shipment
     * @param Customer $customer customer receiving the packages
     * @return float $miles Miles between origin and destination
     */
    public function calculate_distance($store, $customer)
    {
        $origin = implode('+', array(urlencode($store->getAddressLine1()), urlencode($store->getAddressCity()), urlencode($store->getAddressState()), urlencode($store->getAddressZipcode())));
        $dest = implode('+', array(urlencode($customer->address_line_1), urlencode($customer->address_city), urlencode($customer->address_state), urlencode($customer->address_zipcode)));
        $google_maps = sprintf('https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=%s&destinations=%s&mode=driving&language=us-EN&key=%s', $origin, $dest, GOOGLE_MAP_API_KEY);
        $client = new  GuzzleHttp\Client();
        $response = json_decode((string)$client->request('GET', $google_maps)->getBody(), 1);
        if (0 < count($response['rows'])) {
            $result = ($response['rows'][0]['elements'][0]['distance']['value'] > 0) ? $response['rows'][0]['elements'][0]['distance']['value'] * .001 / 1.60934 : 0;
            return $result;
        }
        return 100;
    }

}
