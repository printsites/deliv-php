<?php
/**
 * Copyright (c) 2016 PrintSites
 * User: Joseph Jozwik
 * Date: 6/30/2016
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @since 1.0
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */

namespace Deliv;
/**
 * Class Customer
 * @package Deliv
 */
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
   * @param string $first_name
   * @param string $last_name
   * @param string $business_name
   * @param string $phone
   * @param string $email
   * @param string $address_line1
   * @param string $address_line2
   * @param string $address_city
   * @param string $address_state
   * @param string $address_zipcode
   */
  public function __construct($first_name='', $last_name='', $business_name='', $phone='', $email='', $address_line1='', $address_line2='', $address_city='', $address_state='', $address_zipcode='') {
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->business_name = $business_name;
    $this->phone = $phone;
    $this->email = $email;
    $this->address_line_1 = $address_line1;
    $this->address_line_2 = $address_line2;
    $this->address_city = $address_city;
    $this->address_state = $address_state;
    $this->address_zipcode = $address_zipcode;
  }

}