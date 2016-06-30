<?php
/**
 * Copyright (c) 2016 PrintSites
 * User: Joseph Jozwik
 * Date: 6/30/2016
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @since 1.0
 * @package deliv-php-sdk
 *
 */

/**
 * User: Joseph Jozwik
 * Date: 6/30/2016
 */

namespace Deliv;


use phpDocumentor\Reflection\Types\String_;

class Deliveries extends DelivAPI
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
     * @var string $tracking_code    Order tracking number for deliv package
     */
    public $tracking_code; //String
    /**
     * @var string $order_reference
     */
    public $order_reference; //String
    /**
     * @var string $alt_id_2
     */
    public $alt_id_1 ; //String
    /**
     * @var string $alt_id_2
     */
    public $alt_id_2; //String
    /**
     * @var string $status
     */
    public $status; //String
    /**
     * @var Driver $driver
     */
    public $driver; //Driver
    /**
     * @var string $estimated_delivery_at date(ISO 8601)
     */
    public $estimated_delivery_at; //Date
    /**
     * @var string $delivered_at date(ISO 8601)
     */
    public $delivered_at; //Date
    /**
     * @var string $ready_by date(ISO 8601)
     */
    public $ready_by; //Date
    /**
     * @var TimeWindows $delivery_window
     */
    public $delivery_window; //DeliveryWindow
    /**
     * @var Customer $customer
     */
    public $customer; //Customer
    /**
     * @var Store $store
     */
    public $store; //Store
    /**
     * @var string $origin_comments Comments that are sent to the store for the package to be delivered.
     */
    public $origin_comments;
    /**
     * @var bool $store_signature_required (Optional) Set required signature to true, automatically sets $customer_signature_type to any_signature
     */
    public $store_signature_required; //boolean
    /**
     * @var string $destination_comments  Comments for the recipient recipient package.
     */
    public $destination_comments; //object
    /**
     * @var string $customer_signature_type  Optional Valid options any_signature, leave_at_door, recipient_signature
     */
    public $customer_signature_type;
    /**
     * @var int $age_required (Optional) Minimum age of receiver who can sign for package. Sets signature required to true
     */
    public $age_required;
    /**
     * @var $webhook_url string Url hook to fire on deliver
     */
    public $webhook_url; //object
    /**
     * @var Package[] $packages  Packages included with delivery
     */
    public $packages;
    /**
     * @var string $exception
     */
    public $exception;
    /**
     * @var bool $being_returned
     */
    public $being_returned; //boolean


    public function __construct()
    {

    }

    /**
     * @param Estimate $estimate
     * @param Customer $customer
     * @param string $order_number Order reference number
     * @param string $delivery_window_id Selected delivery window
     */
    public function createNewDelivery($estimate,$customer,$order_number='312312321',$delivery_window_id='1dafc86c-6e57-427a-a3df-afdf7ad03682'){


        $requestFields =  [
            'store_id' => $estimate->store->id,
            'order_reference'=>$order_number,
            'customer' => $customer,
            'delivery_window_id' => $delivery_window_id,
            'ready_by' => $estimate->ready_by,
            'packages' => $estimate->packages
        ];
        if(true===$this->store_signature_required){
            $requestFields['store_signature_required']=true;
        }
        if(in_array($this->customer_signature_type,['recipient_signature','any_signature','leave_at_door'])){
            $requestFields['store_signature_required']=true;
        }
        if(''!=$this->webhook_url){
            $requestFields['webhook_url']=$this->webhook_url;
        }
        if(1 < $this->age_required){
            $requestFields['age_required']=$this->age_required;
        }
        if($this->destination_comments!=''){
            $requestFields['destination_comments']=$this->destination_comments;
        }
        if($this->origin_comments!=''){
            $requestFields['origin_comments']=$this->origin_comments;
        }

        $client = self::getDelivClient();
        $response = $client->post('deliveries', [
            'json' => [
                'store_id' => $estimate->store->id,
                'order_reference'=>$order_number,
                'customer' => $customer,
                'delivery_window_id' => $delivery_window_id,
                'ready_by' => $estimate->ready_by,
                'packages' => $estimate->packages
            ]
        ]);

       $this->fill($response);
        //Recast Responses to SDK Models
        $packages=array();
        foreach ($response->packages as $package) {
            $packages[] = (new Package())->fill($package);
        }
        $this->packages = $packages;
        $this->customer = (new Customer())->fill($response->customer);
        $this->delivery_window = (new TimeWindows())->fill($response->delivery_window);
        $this->store = (new Store())->fill($response->store);
    }

    public function getDeliveryStatus($delivery_id){

    }

    /**
     * @param boolean $store_signature_required
     */
    public function setStoreSignatureRequired($store_signature_required)
    {
        $this->store_signature_required = $store_signature_required;
        // Set at least any signature
        if(null == $this->customer_signature_type) {
            $this->setCustomerSignatureType('any_signature');
        }
    }

    /**
     * @param string $customer_signature_type valid options recipient_signature, any_signature, leave_at_door
     */
    public function setCustomerSignatureType($customer_signature_type)
    {

        if(in_array($customer_signature_type,['recipient_signature','any_signature','leave_at_door'])) {
            $this->customer_signature_type = $customer_signature_type;
        } else {
            throw new \Exception('Invalid  customer_signature_type  valid options are recipient_signature, any_signature, leave_at_door ');
        }
    }

    /**
     * @param \stdClass $destination_comments
     */
    public function setDestinationComments($destination_comments)
    {
        $this->destination_comments = $destination_comments;

    }

    /**
     * @param int $age_required
     */
    public function setAgeRequired($age_required)
    {
        $this->age_required = $age_required;
        $this->setStoreSignatureRequired(true);

    }

    /**
     * @param \stdClass $origin_comments
     */
    public function setOriginComments($origin_comments)
    {
        $this->origin_comments = $origin_comments;

    }



}