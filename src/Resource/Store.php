<?php

namespace Deliv\Resource;

/**
 * Store
 *
 * A store is an object that represents one of you physical brick
 * and mortar places of business, where our drivers pickup packages
 * from you for your customers.
 *
 */
class Store extends AbstractResource
{

    /** @var string $id (Required) */
    public $id;

    /** @var string $id_alias (Optional) */
    public $id_alias;

    /** @var string $name (Required) */
    public $name;

    /** @var string $phone (Required) */
    public $phone;

    /** @var string $suite_number (Optional) */
    public $suite_number;

    /** @var string $address_line_1 (Required) */
    public $address_line_1;

    /** @var string $address_line_2 (Optional) */
    public $address_line_2;

    /** @var string $address_city (Required) */
    public $address_city;

    /** @var string $address_state (Required) */
    public $address_state;

    /** @var string $address_zipcode (Required) */
    public $address_zipcode;

    /** @var string $type (Required) */
    public $type;

    /** @var string $offers_delivery (Required) */
    public $offers_delivery;

    /** @var bool $offers_fetches (Optional) */
    public $offers_fetches;

    /** @var mixed $metro_id (Optional) */
    public $metro_id;

}
