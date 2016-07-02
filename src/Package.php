<?php
namespace Deliv;
/**
 * Package
 *
 * A package is an object representing an item to be delivered.
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
class Package extends DelivAPI
{
    /**
     * @var string $name (Required)
     * @var string $price (Required)
     * @var string (Optional)
     * @var float $height (Optional) inches
     * @var float $width (Optional) inches
     * @var float $depth (Optional) inches
     * @var float $weight (Optional) pounds
     */
    public $name, $price, $SKU, $height, $width, $depth, $weight;

    /**
     * Packages constructor.
     *
     * @param $name (Required)
     * @param $price (Required)
     * @param $SKU (Optional) inches
     * @param float $height Optional) inches
     * @param float $width (Optional) inches
     * @param float $depth (Optional) inches
     * @param float $weight (Optional) inches
     */
    public function __construct($name = 'Package1', $price = '$1.00', $SKU = 1.2, $height = 1.2, $width = 1.2, $depth = 1.2, $weight = 1.2)
    {
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getSKU()
    {
        return $this->SKU;
    }

    /**
     * @param mixed $SKU
     */
    public function setSKU($SKU)
    {
        $this->SKU = $SKU;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @param mixed $depth
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

}