<?php

namespace Deliv\Resource;

/**
 * Driver
 *
 * A driver object represents the Deliv driver that has been assigned to deliver your package(s).
 * Keep in mind that due to the real-time routing of our service, drivers are assigned just-in-time,
 * and may be re-assigned at any time depending on route optimization.
 *
 * @see http://docs.deliv.co/v2/#driver
 *
 */
class Driver extends AbstractResource
{
    /** @var string $name Driver name */
    public $name;

    /** @var string A URL of the driver’s profile photo */
    public $photo_url;

    /** @var float The longitude of the driver’s current location */
    public $longitude;

    /** @var float The latitude of the driver’s current location */
    public $latitude;

}
