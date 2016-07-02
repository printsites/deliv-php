<?php
namespace Deliv;
/**
 * Driver
 *
 * A driver object represents the Deliv driver that has been assigned to deliver your package(s).
 * Keep in mind that due to the real-time routing of our service, drivers are assigned just-in-time,
 * and may be re-assigned at any time depending on route optimization.
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @package deliv-php-sdk
 * @version version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
class Driver extends DelivAPI
{
    /**
     * @var string $name Driver name
     * @var string A URL of the driver’s profile photo
     * @var float The longitude of the driver’s current location
     * @var float The latitude of the driver’s current location
     */
    public $name, $photo_url, $longitude, $latitude; //String


}