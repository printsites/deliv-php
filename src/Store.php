<?php

namespace Deliv;
/**
 * Store
 *
 * A store is an object that represents one of you physical brick
 * and mortar places of business, where our drivers pickup packages
 * from you for your customers.
 *
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @since 1.0
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
class Store extends DelivAPI
{

    /**
     * @var string $id (Required)
     */
    public $id;
    /**
     * @var string $id_alias (Optional)
     */
    public $id_alias;
    /**
     * @var string $name (Required)
     */
    public $name;
    /**
     * @var string $phone (Required)
     */
    public $phone;
    /**
     * @var string $suite_number (Optional)
     */
    public $suite_number;
    /**
     * @var string $address_line_1 (Required)
     */
    public $address_line_1;
    /**
     * @var string $address_line_2 (Optional)
     */
    public $address_line_2;
    /**
     * @var string $address_city (Required)
     */
    public $address_city;
    /**
     * @var string $address_state (Required)
     */
    public $address_state;
    /**
     * @var string $address_zipcode (Required)
     */
    public $address_zipcode;
    /**
     * @var string $type (Required)
     */
    public $type;
    /**
     * @var string $offers_delivery (Required)
     */
    public $offers_delivery;
    /**
     * @var bool $offers_fetches (Optional)
     */
    public $offers_fetches;
    /**
     * @var mixed $metro_id (Optional)
     */
    public $metro_id;

    public function __construct()
    {
        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdAlias()
    {
        return $this->id_alias;
    }

    /**
     * @param mixed $id_alias
     */
    public function setIdAlias($id_alias)
    {
        $this->id_alias = $id_alias;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getSuiteNumber()
    {
        return $this->suite_number;
    }

    /**
     * @param mixed $suite_number
     */
    public function setSuiteNumber($suite_number)
    {
        $this->suite_number = $suite_number;
    }

    /**
     * @return mixed
     */
    public function getAddressLine1()
    {
        return $this->address_line_1;
    }

    /**
     * @param mixed $address_line_1
     */
    public function setAddressLine1($address_line_1)
    {
        $this->address_line_1 = $address_line_1;
    }

    /**
     * @return mixed
     */
    public function getAddressLine2()
    {
        return $this->address_line_2;
    }

    /**
     * @param mixed $address_line_2
     */
    public function setAddressLine2($address_line_2)
    {
        $this->address_line_2 = $address_line_2;
    }

    /**
     * @return mixed
     */
    public function getAddressCity()
    {
        return $this->address_city;
    }

    /**
     * @param mixed $address_city
     */
    public function setAddressCity($address_city)
    {
        $this->address_city = $address_city;
    }

    /**
     * @return mixed
     */
    public function getAddressState()
    {
        return $this->address_state;
    }

    /**
     * @param mixed $address_state
     */
    public function setAddressState($address_state)
    {
        $this->address_state = $address_state;
    }

    /**
     * @return mixed
     */
    public function getAddressZipcode()
    {
        return $this->address_zipcode;
    }

    /**
     * @param mixed $address_zipcode
     */
    public function setAddressZipcode($address_zipcode)
    {
        $this->address_zipcode = $address_zipcode;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getOffersDelivery()
    {
        return $this->offers_delivery;
    }

    /**
     * @param mixed $offers_delivery
     */
    public function setOffersDelivery($offers_delivery)
    {
        $this->offers_delivery = $offers_delivery;
    }

    /**
     * @return mixed
     */
    public function getOffersFetches()
    {
        return $this->offers_fetches;
    }

    /**
     * @param mixed $offers_fetches
     */
    public function setOffersFetches($offers_fetches)
    {
        $this->offers_fetches = $offers_fetches;
    } //String


}