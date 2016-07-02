<?php
namespace Deliv;
/**
 * DelivAPI
 *
 * Abstract class for creating APIClient and fill
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @since 1.0
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
abstract class DelivAPI {

  /**
   * Return static Deliv APIClient
   * @constant string DELIV_API_KEY Deliv API Key
   * @return APIClient
   */
  static function getDelivClient(){
    return new APIClient(DELIV_API_KEY);
  }

  /**
   * Populate class with matching parameters from stdClass
   * @param \stdClass $obj
   * @return $this
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