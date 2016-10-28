<?php

namespace Deliv\Resource;


/**
 * AnytimeWindow
 *
 * The Deliv API also has a notion of “any time before” windows for deliveries that
 * allow for the delivery to be delivered any time during the day.
 * Anytime windows are expressed by having a starts_at value that is null.
 *
 * @see http://docs.deliv.co/v2/#anytime-windows
 */
class AnytimeWindow extends AbstractResource
{
    /** @var string $id uuid id */
    public $id;

    /** @var null|string $starts_at always null */
    public $starts_at = null;

    /** @var null|string $ends_at Represents the end of the window Example: '2014-01-29T05:00:00Z' */
    public $ends_at;

    /** @var string $expires_at The point at which this time window is no longer available. Example: '2014-01-29T05:00:00Z' */
    public $expires_at;
}
