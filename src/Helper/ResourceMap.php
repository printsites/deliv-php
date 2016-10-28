<?php

namespace Deliv\Helper;

/**
 * Various helper methods for creating and mapping resources.
 * @package Deliv\Helper
 */
class ResourceMap
{
    /**
     * Object attributes are automatically mapped to resources.
     * Key = Attribute
     * Value = Resource
     * @return array
     */
    public static function attributeResourceMap()
    {
        return [
            'store' => 'store',
            'stores' => 'store',

            'package' => 'package',
            'packages' => 'package',

            'delivery_window' => 'delivery_window',
            'delivery_windows' => 'delivery_window',

            'delivery' => 'delivery',
            'deliveries' => 'delivery',

            'customer' => 'customer',

            'delivery_estimate' => 'delivery_estimate',
            'delivery_estimates' => 'delivery_estimate',
        ];
    }

    /**
     * Take the stdClass $object and turn it into a resource.
     * @param $object
     * @param null $resource
     * @return mixed
     */
    public static function resourceFactory($object, $resource = null)
    {
        $resources = [
            'anytime_window' => "\\Deliv\\Resource\\AnytimeWindow",
            'customer' => "\\Deliv\\Resource\\Customer",
            'delivery' => "\\Deliv\\Resource\\Delivery",
            'delivery_estimate' => "\\Deliv\\Resource\\DeliveryEstimate",
            'driver' => "\\Deliv\\Resource\\Driver",
            'exception' => "\\Deliv\\Resource\\Exception",
            'fetch' => "\\Deliv\\Resource\\Fetch",
            'fetch_estimate' => "\\Deliv\\Resource\\FetchEstimate",
            'package' => "\\Deliv\\Resource\\Package",
            'proof_of_delivery' => "\\Deliv\\Resource\\ProofOfDelivery",
            'return_signature' => "\\Deliv\\Resource\\ReturnSignature",
            'store' => "\\Deliv\\Resource\\Store",
            'time_window' => "\\Deliv\\Resource\\TimeWindow",
            'unavailable_window' => "\\Deliv\\Resource\\UnavailableWindow",
        ];

        if (is_object($object)) {
            if (isset($resources[$resource]) && class_exists($resources[$resource])) {
                return new $resources[$resource]($object);
            }
            return $object;
        }

        return $object;
    }
}
