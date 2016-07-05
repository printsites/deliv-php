<?php
namespace Deliv;
/**
 * TimeWindows
 *
 * A Time Window is an object that represents an available window when a
 * delivery or fetch will take place with the customer.
 *
 * Each Time Window also contains a expires_at property. The expires_at
 * is a timestamp by which your fetch or delivery must be created to use
 * this window. If you wait until after the expiration time to submit the
 * delivery, you will receive a 400 Illegal Time Window response.
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
class TimeWindows extends DelivAPI
{
    /**
     * @var string $id uuid id
     * @var null|string $starts_at Represents the start of the window. Example: '2014-01-29T05:00:00Z'
     * @var null|string $ends_at Represents the end of the window Example: '2014-01-29T05:00:00Z'
     * @var string $expires_at The point at which this time window is no longer available. Example: '2014-01-29T05:00:00Z'
     */
    public $id;
    public $starts_at;
    public $ends_at;
    public $expires_at;

    /**
     * TimeWindows constructor.
     *
     * @param string $id uuid
     * @param string $starts_at can be null
     * @param string $ends_at end of window
     * @param string $expires_at expiration time
     */
    public function __construct($id = '04eac8c3-05cf-4d5b-80e3-6121b4229a2e', $starts_at = NULL, $ends_at = '2014-01-29T05:00:00Z', $expires_at = '2014-01-29T05:00:00Z')
    {
        $this->id = $id;
        $this->starts_at = $starts_at;
        $this->ends_at = $ends_at;
        $this->expires_at = $expires_at;
    }

}