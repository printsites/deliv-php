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
 * Class DestinationSignature
 * @package Deliv
 */
class DestinationSignature
{
  public $photo_url; //String
  public $last_name; //String
}

/**
 * Class ProofOfDeliver
 * @package Deliv
 */
class ProofOfDeliver
{
  public $delivery_photo; //String
  public $destination_signature; //DestinationSignature
}