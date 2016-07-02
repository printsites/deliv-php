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
     */
    public $id; //String
    /**
     * @var string $object
     */
    public $object; //String
    /**
     * @var string $ready_by date(ISO 8601)
     */
    public $ready_by; //Date
    /**
     * @var TimeWindows[] $delivery_windows
     */
    public $delivery_windows; //array(DeliveryWindow)
    /**
     * @var float $distance
     */
    public $distance; //double
    /**
     * @var TimeWindows[] $unavailable_windows
     */
    public $unavailable_windows; //array(UnavailableWindow)

    /**
     * @var Store $store
     */
    public $store; //Store
    /**
     * @var string $customer_zipcode
     */
    public $customer_zipcode; //String
    /**
     * @var Package[] $packages
     */
    public $packages; //array(Package)

    /**
     * Estimate constructor.
     * @param \stdClass $response From get estimate request.
     */
    public function __construct($response)
    {
        $this->fill($response);
        $delivery_windows = array();
        $packages=array();
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