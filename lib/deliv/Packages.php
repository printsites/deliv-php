<?php
/**
 * Copyright (c) 2016
 */

/**
 * User: Joseph Jozwik
 * Date: 6/22/2016
 */

namespace Deliv;

class Packages {

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
  public function __construct($name, $price, $SKU, $height, $width, $depth, $weight) {
    $this->name = $name;
    $this->price = $price;
    $this->SKU = $SKU;
    $this->height = $height;
    $this->width = $width;
    $this->depth = $depth;
    $this->weight = $weight;
  }

}