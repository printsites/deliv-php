<?php
namespace Deliv;
/**
 * Class Deliveries
 *
 * Used to Create deliveries, check status of delivery, make changes to deliveries
 * Fundamentally, a delivery is a transaction to request that Deliv move packages from a store to a customer.
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @package Deliv
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
class Deliveries extends DelivAPI
{

    /**
     * @var string $id uuid for Delivery. Example: "67e382e5-ffd7-4af5-a8e5-9382904faf93"
     * @var string $object
     * @var string $tracking_code Order tracking number for deliv package. Example: "1V8XJJCV"
     * @var string $order_reference Your internal order number, for reconciling. Example: "12324"
     * @var string $alt_id_2 Additional internal order number, for reconciling
     * @var string $alt_id_2 Additional internal order number, for reconciling
     * @var string $status The status of the delivery. Example: "pending_delivery_time|assigned|in_transit|delivered|returned|canceled"
     * @var Driver $driver
     * @var string $estimated_delivery_at The time when the delivery can be picked up date(ISO 8601). Example "2014-01-29T05:00:00Z"
     * @var string $delivered_at date(ISO 8601) Example "2014-01-29T05:00:00Z"
     * @var string $ready_by date(ISO 8601)
     * @var TimeWindows $delivery_window The chosen delivery window from your delivery estimate
     * @var Customer $customer The customer the packages will be delivered to
     * @var Store $store The store the packages will be picked up from
     * @var string $origin_comments Comments that are sent to the store for the package to be delivered.
     * @var bool $store_signature_required (Optional) Special instructions for the driver during pickup (i.e. what counter to pickup from)
     * @var string $destination_comments (Optional) Special instructions for the driver during delivery (i.e. gate codes, etc)
     * @var string $customer_signature_type (Optional) Valid options any_signature, leave_at_door, recipient_signature
     * @var int $age_required (Optional) Minimum age of receiver who can sign for package. Sets signature required to true
     * @var string $webhook_url A URL where you can receive updates on this delivery
     * @var array $packages A set of one or more packages to be delivered
     * @var string $exception The exception that lead to the delivery’s cancel or return
     * @var bool $being_returned Whether or not the delivery is being returned
     * @var string $return_signature The return signature, if captured and the delivery has been returned
     *
     */
    public $id;
    public $object;
    public $tracking_code;
    public $order_reference;
    public $alt_id_1;
    public $alt_id_2;
    public $status;
    public $driver;
    public $estimated_delivery_at;
    public $delivered_at;
    public $ready_by;
    public $delivery_window;
    public $customer;
    public $store;
    public $origin_comments;
    public $store_signature_required;
    public $destination_comments;
    public $customer_signature_type;
    public $age_required;
    public $webhook_url;
    public $packages;
    public $exception;
    public $being_returned;
    public $return_signature;

    /**
     * Deliveries constructor.
     */
    public function __construct()
    {

    }

    /**
     * Create new Deliv Delivery based on previous DeliveryEstimate. In order to create a delivery, you should first create a delivery estimate.
     *
     * @param Estimate $estimate Previously generated time estimate from Deliv
     * @param Customer $customer Customer to receive delivery
     * @param string $order_number Order reference number
     * @param string $delivery_window_id Selected delivery window
     */
    public function createNewDelivery($estimate, $customer, $order_number = '312312321', $delivery_window_id = '1dafc86c-6e57-427a-a3df-afdf7ad03682')
    {
        $requestFields = [
            'store_id' => $estimate->store->id,
            'order_reference' => $order_number,
            'customer' => $customer,
            'delivery_window_id' => $delivery_window_id,
            'ready_by' => $estimate->ready_by,
            'packages' => $estimate->packages
        ];
        if (true === $this->store_signature_required) {
            $requestFields['store_signature_required'] = true;
        }
        if (in_array($this->customer_signature_type, ['recipient_signature', 'any_signature', 'leave_at_door'])) {
            $requestFields['store_signature_required'] = true;
        }
        if ('' != $this->webhook_url) {
            $requestFields['webhook_url'] = $this->webhook_url;
        }
        if (1 < $this->age_required) {
            $requestFields['age_required'] = $this->age_required;
        }
        if ($this->destination_comments != '') {
            $requestFields['destination_comments'] = $this->destination_comments;
        }
        if ($this->origin_comments != '') {
            $requestFields['origin_comments'] = $this->origin_comments;
        }

        $client = self::getDelivClient();
        $response = $client->post('deliveries', [
            'json' => [
                'store_id' => $estimate->store->id,
                'order_reference' => $order_number,
                'customer' => $customer,
                'delivery_window_id' => $delivery_window_id,
                'ready_by' => $estimate->ready_by,
                'packages' => $estimate->packages
            ]
        ]);

        $this->fill($response);
        //Recast Responses to SDK Models
        $packages = array();
        foreach ($response->packages as $package) {
            $packages[] = (new Package())->fill($package);
        }
        $this->packages = $packages;
        $this->customer = (new Customer())->fill($response->customer);
        $this->delivery_window = (new TimeWindows())->fill($response->delivery_window);
        $this->store = (new Store())->fill($response->store);
    }

    /**
     * Retrieve previous delivery and populate this Deliveries class with details.
     * @param $delivery_id
     * @return void
     */
    public function retrieveDeliveryStatus($delivery_id)
    {

        $client = self::getDelivClient();
        $response = $client->get('deliveries/' . $delivery_id);
        $this->fill($response);
        //Recast Responses to SDK Models
        $packages = array();
        foreach ($response->packages as $package) {
            $packages[] = (new Package())->fill($package);
        }
        $this->packages = $packages;
        $this->customer = (new Customer())->fill($response->customer);
        $this->delivery_window = (new TimeWindows())->fill($response->delivery_window);
        $this->store = (new Store())->fill($response->store);
    }

    /**
     * Set the signature requirement flag. Also sets the base $customer_signature_type to any_signature if not set.
     * @param boolean $store_signature_required Required signature.
     */
    public function setStoreSignatureRequired($store_signature_required)
    {
        $this->store_signature_required = $store_signature_required;
        // Set at least any signature
        if (null == $this->customer_signature_type) {
            $this->setCustomerSignatureType('any_signature');
        }
    }

    /**
     * Sets $customer_signature_type.
     *
     * <ul>
     *  <li>recipient_signature    The signature must be from the customer specified in the order</li>
     *  <li>any_signature    The signature can be from anyone at the customer address</li>
     *  <li>leave_at_door    No signature is required; if the driver deems it safe, packages will be left at customer site. This option is not allowed if age_required is present and > 0.</li>
     * </ul>
     *
     * @param string $customer_signature_type valid options recipient_signature, any_signature, leave_at_door
     * @throws \Exception if signature type is not valid.
     */
    public function setCustomerSignatureType($customer_signature_type)
    {
        if (!in_array($customer_signature_type, ['recipient_signature', 'any_signature', 'leave_at_door'])) {
            throw new \Exception('Invalid  customer_signature_type  valid options are recipient_signature, any_signature, leave_at_door ');
        }
        $this->customer_signature_type = $customer_signature_type;
    }

    /**
     * Set destination comments
     * @param string $destination_comments Special instructions for the driver during delivery (i.e. gate codes, etc)
     * @return void
     */
    public function setDestinationComments($destination_comments)
    {
        $this->destination_comments = $destination_comments;
    }

    /**
     * Set minimum age for recipient
     * @param int $age_required Minimum age of recipient (i.e. 21 for alcohol related deliveries)
     * @return void
     */
    public function setAgeRequired($age_required)
    {
        $this->age_required = $age_required;
        $this->setStoreSignatureRequired(true);
    }

    /**
     * Set origin_comments
     * @param string $origin_comments Special instructions for the driver during pickup form the store
     * @return void
     */
    public function setOriginComments($origin_comments)
    {
        $this->origin_comments = $origin_comments;
    }


}