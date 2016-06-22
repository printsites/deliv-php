<?php
/**
 * Copyright (c) 2016
 */

/**
 * User: Joseph Jozwik
 * Date: 6/22/2016
 */

namespace Deliv;

class DestinationSignature
{
  public $photo_url; //String
  public $last_name; //String
}

class ProofOfDeliver
{
  public $delivery_photo; //String
  public $destination_signature; //DestinationSignature
}