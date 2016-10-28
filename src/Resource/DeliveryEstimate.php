<?php

namespace Deliv\Resource;

/**
 * Delivery Estimate
 *
 * A store is an object that represents one of you physical brick
 * and mortar places of business, where our drivers pickup packages
 * from you for your customers.
 *
 */
class DeliveryEstimate extends AbstractResource
{

    /** @var string $id (Required) */
    public $id;

    /**
     * @param $store_id_alias
     * @return \stdClass
     */
    public static function factory($store_id_alias) {
        $delivery_estimate = new \stdClass();
        $delivery_estimate->store_id_alias = $store_id_alias;
        $delivery_estimate->customer_zipcode = "";
        $delivery_estimate->ready_by = \Deliv\Helper\Misc::formatTimestamp(strtotime("+1 day"));
        $delivery_estimate->packages = [];
        return $delivery_estimate;
    }

}
