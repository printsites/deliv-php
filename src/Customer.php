<?php
namespace Deliv;
/**
 * Customer
 *
 * An object representing your customer, or the recipient of the delivery.
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
class Customer  extends DelivAPI {

  /**
   * @var string $first_name (Required)
   * @var string $last_name (Required)
   * @var string $business_name (Optional)
   * @var string $phone (Required) Minimum 10 digits
   * @var string $email (Optional)
   * @var string $address_line_1 (Required)
   * @var string $address_line2 (Optional)
   * @var string $address_city (Required)
   * @var string $address_state (Required) Two letter abbreviation (i.e. ‘CA’)
   * @var string $address_zipcode (Required) Standard 5-digit zip
   */
  public $first_name,$last_name,$business_name,$phone,$email,$address_line_1,$address_line_2,$address_city,$address_state,$address_zipcode;

  /**
   * Customer constructor.
   *
   * @param string $first_name (Required)
   * @param string $last_name (Required)
   * @param string $business_name (Optional)
   * @param string $phone (Required)
   * @param string $email (Optional)
   * @param string $address_line1 (Required)
   * @param string $address_line2 (Optional)
   * @param string $address_city (Required)
   * @param string $address_state (Required) Two letter abbreviation (i.e. ‘CA’)
   * @param string $address_zipcode (Required) Standard 5-digit zip
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