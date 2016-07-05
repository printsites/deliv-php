<?php
namespace Deliv;

/**
 * ReturnSignature
 *
 * A return signature object contains a URL of the return
 * signature photo and the last name captured at time of return.
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */

class ReturnSignature
{
    /**
     * @var string $photo_url A URL of the signature
     * @var string $last_name The last name of the person who signed for the return
     */
    public $photo_url;
    public $last_name;
}