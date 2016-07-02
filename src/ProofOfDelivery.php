<?php
namespace Deliv;
/**
 * DestinationSignature
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @since 1.0
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */

class DestinationSignature
{
    /**
     * @var string $photo_url A URL for the proof of delivery photo taken at dropoff if present
     * @var string $last_name The last name of the person who signed for the package
     */
    public $photo_url, $last_name;
}

/**
 * ProofOfDeliver
 *
 * A proof of delivery object contains a URL for a proof of delivery
 * photo and/or the destination_signature representation of the captured
 * at delivery.
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @since 1.0
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
class ProofOfDeliver
{
    /**
     * @var string $delivery_photo A URL for the proof of delivery photo taken at dropoff if present
     * @var string $destination_signature A hash containing photo_url and last_name if present
     */
    public $delivery_photo, $destination_signature;
  
}