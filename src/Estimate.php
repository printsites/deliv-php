<?php
namespace Deliv;
/**
 * Estimate
 *
 * Delivery Estimates are used to validate address information, as well as get
 * currently available delivery windows for a delivery. Delivery Estimates also
 * ensure that the Deliv service is currently servicing that metro area. For
 * these reasons, a Delivery Estimate should be created in advance of creating
 * an actual Delivery.
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
class Estimate extends DelivAPI
{
    /**
     * @var string $id
     * @var string $object
     * @var string $ready_by date(ISO 8601)
     * @var TimeWindows[] $delivery_windows
     * @var float $distance
     * @var TimeWindows[] $unavailable_windows
     * @var Store $store Store class
     * @var string $customer_zipcode
     * @var Package[] $packages
     */
    public $id;
    public $object;
    public $ready_by;
    public $delivery_windows;
    public $distance;
    public $unavailable_windows;
    public $store;
    public $customer_zipcode;
    public $packages;

    /**
     * Estimate constructor.
     * @param \stdClass $response From get estimate request.
     */
    public function __construct($response)
    {
        $this->fill($response);
        $delivery_windows = array();
        $packages = array();
        $unavailable_windows = array();
        foreach ($response->unavailable_windows as $window) {
            $unavailable_windows[] = (new TimeWindows())->fill($window);
        }
        $this->unavailable_windows = $unavailable_windows;
        foreach ($response->delivery_windows as $window) {
            $delivery_windows[] = (new TimeWindows())->fill($window);
        }
        $this->delivery_windows = $delivery_windows;
        foreach ($response->packages as $package) {
            $packages[] = (new Package())->fill($package);
        }
        $this->packages = $packages;
        $this->store = (new Store())->fill($response->store);
    }

}