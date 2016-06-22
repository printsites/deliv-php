<?php
/**
 * Copyright (c) 2016
 */

/**
 * User: Joseph Jozwik
 * Date: 6/22/2016
 */

namespace Deliv;

abstract class DelivAPI {
  /**
   * @return \Deliv\APIClient
   */
  static function getDelivClient(){
    return new APIClient(DELIV_API_KEY);
  }


}