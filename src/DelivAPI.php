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
 * Class DelivAPI
 * @package Deliv
 */
abstract class DelivAPI {
  /**
   * @return \Deliv\APIClient
   */
  static function getDelivClient(){
    return new APIClient(DELIV_API_KEY);
  }

  /**
   * @param \stdClass $obj
   */
  public function fill(\stdClass $obj){
    $obj_properties = array_keys(get_object_vars($this));
    foreach(get_object_vars($obj) as $obj_key=>$value){
      if(in_array($obj_key,$obj_properties)){
        $this->$obj_key=$value;
      }
    }
  return $this;
  }
}