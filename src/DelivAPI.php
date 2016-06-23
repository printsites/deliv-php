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