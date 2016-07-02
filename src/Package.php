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
 * Represents a Package for Delivery
 * Class Package
 * @package Deliv
 */
class Package extends DelivAPI {

  public $name; //String
  public $price; //String
  public $SKU; //String
  public $height; //double
  public $width; //int
  public $depth; //int
  public $weight; //double

  /**
   * Packages constructor.
   *
   * @param $name
   * @param $price
   * @param $SKU
   * @param $height
   * @param $width
   * @param $depth
   * @param $weight
   */
  public function __construct($name = '', $price = NULL, $SKU = NULL, $height = NULL, $width = NULL, $depth = NULL, $weight = '') {
    $this->name = $name;
    $this->price = $price;
    $this->SKU = $SKU;
    $this->height = $height;
    $this->width = $width;
    $this->depth = $depth;
    $this->weight = $weight;
  }

  /**
   * @return mixed
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @param mixed $name
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   * @return mixed
   */
  public function getPrice() {
    return $this->price;
  }

  /**
   * @param mixed $price
   */
  public function setPrice($price) {
    $this->price = $price;
  }

  /**
   * @return mixed
   */
  public function getSKU() {
    return $this->SKU;
  }

  /**
   * @param mixed $SKU
   */
  public function setSKU($SKU) {
    $this->SKU = $SKU;
  }

  /**
   * @return mixed
   */
  public function getHeight() {
    return $this->height;
  }

  /**
   * @param mixed $height
   */
  public function setHeight($height) {
    $this->height = $height;
  }

  /**
   * @return mixed
   */
  public function getWidth() {
    return $this->width;
  }

  /**
   * @param mixed $width
   */
  public function setWidth($width) {
    $this->width = $width;
  }

  /**
   * @return mixed
   */
  public function getDepth() {
    return $this->depth;
  }

  /**
   * @param mixed $depth
   */
  public function setDepth($depth) {
    $this->depth = $depth;
  }

  /**
   * @return mixed
   */
  public function getWeight() {
    return $this->weight;
  }

  /**
   * @param mixed $weight
   */
  public function setWeight($weight) {
    $this->weight = $weight;
  }

}