<?php
/**
 * User: Joseph Jozwik
 * Date: 6/22/2016
 */

namespace Deliv;

class Customer  extends DelivAPI {
  public $first_name; //String
  public $last_name; //String
  public $business_name; //String
  public $phone; //String
  public $email; //String
  public $address_line_1; //String
  public $address_line_2; //String
  public $address_city; //String
  public $address_state; //String
  public $address_zipcode; //String
  /**
   * Customer constructor.
   *
   * @param $first_name
   * @param $last_name
   * @param $business_name
   * @param $phone
   * @param $email
   * @param $address_line1
   * @param $address_line2
   * @param $address_city
   * @param $address_state
   * @param $address_zipcode
   */
  public function __construct($first_name, $last_name, $business_name, $phone, $email, $address_line1, $address_line2, $address_city, $address_state, $address_zipcode) {
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->business_name = $business_name;
    $this->phone = $phone;
    $this->email = $email;
    $this->address_line1 = $address_line1;
    $this->address_line2 = $address_line2;
    $this->address_city = $address_city;
    $this->address_state = $address_state;
    $this->address_zipcode = $address_zipcode;
  }

}