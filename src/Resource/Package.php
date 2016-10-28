<?php

namespace Deliv\Resource;

/**
 * Package
 *
 * A package is an object representing an item to be delivered.
 *
 * @see http://docs.deliv.co/v2/#packages
 */
class Package extends AbstractResource
{
    /** @var string $name (Required) */
    public $name;

    /** @var string $price (Required) */
    public $price;

    /** @var string (Optional) */
    public $SKU;


    /** @var float $height (Optional) inches */
    public $height;

    /** @var float $width (Optional) inches */
    public $width;

    /** @var float $depth (Optional) inches */
    public $depth;

    /** @var float $weight (Optional) pounds */
    public $weight;

    public static function factory() {
        $package = new \stdClass();
        $package->name = "";
        $package->price = "";
        $package->SKU = "";
        $package->height = null;
        $package->width = null;
        $package->depth = null;
        $package->weight = null;
        return $package;
    }
}
