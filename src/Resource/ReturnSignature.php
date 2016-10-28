<?php
namespace Deliv\Resource;

/**
 * ReturnSignature
 *
 * A return signature object contains a URL of the return
 * signature photo and the last name captured at time of return.
 *
 * @see http://docs.deliv.co/v2/#return-signature
 */

class ReturnSignature extends AbstractResource
{
    /** @var string $photo_url A URL of the signature */
    public $photo_url;

    /** @var string $last_name The last name of the person who signed for the return */
    public $last_name;
}
