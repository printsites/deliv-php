<?php
namespace Deliv\Resource;

/**
 * TimeWindow
 *
 * A Time Window is an object that represents an available window when a
 * delivery or fetch will take place with the customer.
 *
 * Each Time Window also contains a expires_at property. The expires_at
 * is a timestamp by which your fetch or delivery must be created to use
 * this window. If you wait until after the expiration time to submit the
 * delivery, you will receive a 400 Illegal Time Window response.
 *
 * @see http://docs.deliv.co/v2/#time-windows
 */
class TimeWindow extends AbstractResource
{
    /** @var string $id uuid id */
    public $id;

    /** @var null|string $starts_at Represents the start of the window. Example: '2014-01-29T05:00:00Z' */
    public $starts_at;

    /** @var null|string $ends_at Represents the end of the window Example: '2014-01-29T05:00:00Z' */
    public $ends_at;

    /** @var string $expires_at The point at which this time window is no longer available. Example: '2014-01-29T05:00:00Z' */
    public $expires_at;
}
