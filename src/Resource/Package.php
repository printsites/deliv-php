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
    public $sku;

    /** @var float $height (Optional) inches */
    public $height;

    /** @var float $width (Optional) inches */
    public $width;

    /** @var float $depth (Optional) inches */
    public $depth;

    /** @var float $weight (Optional) pounds */
    public $weight;

    public function __construct(\stdClass $data)
    {
        parent::__construct($data);
        $this->sku = $this->SKU;
        unset($this->SKU);

    }
}
