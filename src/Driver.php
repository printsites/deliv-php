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
 * Represents a Deliv driver
 *
 * Class Driver
 * @package Deliv
 */
class Driver extends DelivAPI {
  public $name; //String
  public $photo_url; //String
  public $longitude; //double
  public $latitude; //double

  
}