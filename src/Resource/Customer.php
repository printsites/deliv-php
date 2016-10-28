<?php

namespace Deliv\Resource;

/**
 * Customer
 *
 * An object representing your customer, or the recipient of the delivery.
 *
 * @see http://docs.deliv.co/v2/#customer
 */
class Customer extends AbstractResource
{
    /** @var string $first_name (Required) */
    public $first_name;

    /** @var string $last_name (Required) */

    public $last_name;

    /** @var string $business_name (Optional) */
    public $business_name;

    /** @var string $phone (Required) Minimum 10 digits */

    public $phone;

    /** @var string $email (Optional) */
    public $email;

    /** @var string $address_line_1 (Required) */

    public $address_line_1;

    /** @var string $address_line2 (Optional) */

    public $address_line_2;

    /** @var string $address_city (Required) */
    public $address_city;

    /** @var string $address_state (Required) Two letter abbreviation (i.e. ‘CA’) */

    public $address_state;

    /** @var string $address_zipcode (Required) Standard 5-digit zip */
    public $address_zipcode;

    /**
     * @return \stdClass
     */
    public static function factory()
    {
        $customer = new \stdClass();
        $customer->first_name = "";
        $customer->last_name = "";
        $customer->business_name = null;
        $customer->phone = "";
        $customer->email = null;
        $customer->address_line_1 = "";
        $customer->address_line_2 = null;
        $customer->address_city = "";
        $customer->address_state = "";
        $customer->address_zipcode = "";
        return $customer;
    }
}
