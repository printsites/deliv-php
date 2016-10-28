<?php

namespace Deliv\Resource;

/**
 * UnavailableWindow
 *
 * An Unavailable Window is similar to a time windows, but it represents a window
 * that is not available to be consumed. You can use unavailable windows as
 * informational context to your users as windows that that are “sold out”.
 *
 * @see http://docs.deliv.co/v2/#unavailable-windows
 */
class UnavailableWindow extends AbstractResource
{
    /** @var null|string $starts_at always null */
    public $starts_at = null;

    /** @var null|string $ends_at Represents the end of the window Example: '2014-01-29T05:00:00Z' */
    public $ends_at;

    /** @var string $expires_at The point at which this time window is no longer available. Example: '2014-01-29T05:00:00Z' */
    public $expires_at;
}
