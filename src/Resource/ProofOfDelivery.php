<?php

namespace Deliv\Resource;

/**
 * ProofOfDelivery
 *
 * A proof of delivery object contains a URL for a proof of delivery
 * photo and/or the destination_signature representation of the captured
 * at delivery.
 *
 * @see http://docs.deliv.co/v2/#proof-of-delivery
 */
class ProofOfDelivery extends AbstractResource
{
    /**
     * @var string $delivery_photo A URL for the proof of delivery photo taken at dropoff if present
     */
    public $delivery_photo;

    /**
     * @var string $destination_signature A hash containing photo_url and last_name if present
     */
    public $destination_signature;

}
