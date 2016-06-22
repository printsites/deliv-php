<?php
/**
 * Copyright (c) 2016
 */

/**
 * User: Joseph Jozwik
 * Date: 6/22/2016
 */

namespace Deliv;

class Store {
  public $id; //String
  public $id_alias; //String
  public $name; //String
  public $phone; //String
  public $suite_number; //String
  public $address_line_1; //String
  public $address_line_2; //String
  public $address_city; //String
  public $address_state; //String
  public $address_zipcode; //String
  public $type; //String
  public $offers_delivery; //boolean
  public $offers_fetches; //boolean
  public $metro_id;

  /**
   * Store constructor.
   *
   * @param $id
   * @param $id_alias
   * @param $name
   * @param $phone
   * @param $suite_number
   * @param $address_line_1
   * @param $address_line_2
   * @param $address_city
   * @param $address_state
   * @param $address_zipcode
   * @param $type
   * @param $offers_delivery
   * @param $offers_fetches
   * @param $metro_id
   */
  public function __construct($id, $id_alias, $name, $phone, $suite_number, $address_line_1, $address_line_2, $address_city, $address_state, $address_zipcode, $type, $offers_delivery, $offers_fetches, $metro_id) {
    $this->id = $id;
    $this->id_alias = $id_alias;
    $this->name = $name;
    $this->phone = $phone;
    $this->suite_number = $suite_number;
    $this->address_line_1 = $address_line_1;
    $this->address_line_2 = $address_line_2;
    $this->address_city = $address_city;
    $this->address_state = $address_state;
    $this->address_zipcode = $address_zipcode;
    $this->type = $type;
    $this->offers_delivery = $offers_delivery;
    $this->offers_fetches = $offers_fetches;
    $this->metro_id = $metro_id;
  }

  /**
   * @return mixed
   */
  public function getMetroId() {
    return $this->metro_id;
  }

  /**
   * @param mixed $metro_id
   */
  public function setMetroId($metro_id) {
    $this->metro_id = $metro_id;
  }

  /**
   * @return mixed
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param mixed $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * @return mixed
   */
  public function getIdAlias() {
    return $this->id_alias;
  }

  /**
   * @param mixed $id_alias
   */
  public function setIdAlias($id_alias) {
    $this->id_alias = $id_alias;
  }

  /**
   * @return mixed
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @param mixed $name
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   * @return mixed
   */
  public function getPhone() {
    return $this->phone;
  }

  /**
   * @param mixed $phone
   */
  public function setPhone($phone) {
    $this->phone = $phone;
  }

  /**
   * @return mixed
   */
  public function getSuiteNumber() {
    return $this->suite_number;
  }

  /**
   * @param mixed $suite_number
   */
  public function setSuiteNumber($suite_number) {
    $this->suite_number = $suite_number;
  }

  /**
   * @return mixed
   */
  public function getAddressLine1() {
    return $this->address_line_1;
  }

  /**
   * @param mixed $address_line_1
   */
  public function setAddressLine1($address_line_1) {
    $this->address_line_1 = $address_line_1;
  }

  /**
   * @return mixed
   */
  public function getAddressLine2() {
    return $this->address_line_2;
  }

  /**
   * @param mixed $address_line_2
   */
  public function setAddressLine2($address_line_2) {
    $this->address_line_2 = $address_line_2;
  }

  /**
   * @return mixed
   */
  public function getAddressCity() {
    return $this->address_city;
  }

  /**
   * @param mixed $address_city
   */
  public function setAddressCity($address_city) {
    $this->address_city = $address_city;
  }

  /**
   * @return mixed
   */
  public function getAddressState() {
    return $this->address_state;
  }

  /**
   * @param mixed $address_state
   */
  public function setAddressState($address_state) {
    $this->address_state = $address_state;
  }

  /**
   * @return mixed
   */
  public function getAddressZipcode() {
    return $this->address_zipcode;
  }

  /**
   * @param mixed $address_zipcode
   */
  public function setAddressZipcode($address_zipcode) {
    $this->address_zipcode = $address_zipcode;
  }

  /**
   * @return mixed
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param mixed $type
   */
  public function setType($type) {
    $this->type = $type;
  }

  /**
   * @return mixed
   */
  public function getOffersDelivery() {
    return $this->offers_delivery;
  }

  /**
   * @param mixed $offers_delivery
   */
  public function setOffersDelivery($offers_delivery) {
    $this->offers_delivery = $offers_delivery;
  }

  /**
   * @return mixed
   */
  public function getOffersFetches() {
    return $this->offers_fetches;
  }

  /**
   * @param mixed $offers_fetches
   */
  public function setOffersFetches($offers_fetches) {
    $this->offers_fetches = $offers_fetches;
  } //String


}