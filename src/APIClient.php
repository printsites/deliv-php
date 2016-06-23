<?php
/**
 * Copyright (c) 2016
 */
namespace Deliv;
use GuzzleHttp;

/**
 * 
 */
class APIClient {
    
    private $lastRequest;
    private $lastRequestData;
    private $api_key;
    private static $api_client;
    private $apiUrl;
    private static $defaults = array(
        'verify_ssl' => true
    );

    /**
     * APIClient constructor.
     *
     * @param $api_key
     * @param string $apiUrl
     */
    public function __construct($api_key, $apiUrl='https://api-sandbox.deliv.co/v2/') {
        $this->api_key = $api_key;
        $this->apiUrl=$apiUrl;
        $this->opts = array_merge(self::$defaults);
    }
    
    /**
     * Makes HTTP Request against the API
     * @param string  $url
     * @param array   $parameters
     * @param boolean $request
     * 
     * @return mixed
     */
    protected function request($url, $body, $parameters = array(), $request = 'GET') {
        $this->lastRequest = $url;
        $this->lastRequestData = $parameters;

        $parameters = array_merge($parameters, ['headers' => ['Api-Key' => $this->api_key]]);

        $client = new  GuzzleHttp\Client();

        $response = $client->request($request, $this->apiUrl . $url, $parameters);
        if ('200' != $response->getStatusCode()) {
            throw new \Exception('Deliv API Request Failed. Status: ' . $response->getStatusCode());
        }
        return json_decode((string) $response->getBody());
    }
    
    /**
     * Sends GET request to specified API endpoint
     * @param string $request
     * @param string $accessToken
     * @param array $parameters
     * @example http://strava.github.io/api/v3/athlete/#koms
     * @return function
     */
    public function get($request, $parameters=array()){

        return $this->request($request,'', $parameters,'GET');
    }

    /**
     * Sends PUT request to specified API endpoint
     * @param string $request
     * @param string $accessToken
     * @param array $parameters
     * @example http://strava.github.io/api/v3/athlete/#update
     * @return function
     */
    public function put( $request, $accessToken, $parameters = array() ){
        $parameters = array_merge( $parameters, array( 'access_token' => $accessToken ) );
        return $this->request( $this->apiUrl . $request, $parameters, 'PUT' );
    }

    /**
     * Sends POST request to specified API endpoint
     * @param string $request
     * @param string $accessToken
     * @param array $parameters
     * @example http://strava.github.io/api/v3/activities/#create
     * @return function
     */
    public function post( $request, $accessToken, $parameters = array() ){
        $parameters = array_merge( $parameters, array( 'access_token' => $accessToken ) );
        return $this->request( $this->apiUrl . $request, $parameters );
    }

    /**
     * Sends DELETE request to specified API endpoint
     * @param string $request
     * @param string $accessToken
     * @param array $parameters
     * @example http://strava.github.io/api/v3/activities/#delete
     * @return function
     */
    public function delete( $request, $accessToken, $parameters = array() ){
        $parameters = array_merge( $parameters, array( 'access_token' => $accessToken ) );
        return $this->request( $this->apiUrl . $request, $parameters, 'DELETE' );
    }
    
}
