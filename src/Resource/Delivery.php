<?php

namespace Deliv\Resource;

/**
 * Delivery
 *
 * A store is an object that represents one of you physical brick
 * and mortar places of business, where our drivers pickup packages
 * from you for your customers.
 *
 */
class Delivery extends AbstractResource
{

    /** @var string $id (Required) */
    public $id;

    /**
     * @param $delivery_window_id
     * @param $store_id_alias
     * @return \stdClass
     */
    public static function factory($delivery_window_id, $store_id_alias) {
        $delivery = new \stdClass();
        $delivery->store_id_alias = $store_id_alias;
        $delivery->order_reference = "";
        $delivery->customer = new \stdClass();
        $delivery->ready_by = \Deliv\Helper\Misc::formatTimestamp(strtotime("+1 day"));
        $delivery->packages = [];
        $delivery->delivery_window_id = $delivery_window_id;
        return $delivery;
    }

}
