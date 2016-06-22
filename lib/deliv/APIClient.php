<?php
namespace Deliv;
/**
 * 
 */
class APIClient {
    
    private $lastRequest;
    private $lastRequestData;
    private $api_key;
    private static $api_client;
    private static $defaults = array(
        'verify_ssl' => true
    );
    
    /**
     * Singleton method for getting the APIClient
     * 
     * @param $opts
     * @return 
     */
    public function __construct($api_key, $opts=array()) {
        $this->api_key = $api_key; 
        $this->opts = array_merge(self::$defaults, $opts);
    }
    
    /**
     * Makes HTTP Request against the API
     * @param string  $url
     * @param array   $parameters
     * @param boolean $request
     * 
     * @return mixed
     */
    protected function request($url, $body, $parameters=array(), $request='GET'){
        $this->lastRequest = $url;
        $this->lastRequestData = $parameters;

        $parameters = array_merge($parameters, array('api_key' => $this->api_key)

        // init curl
        //
        $curl = curl_init($url.'?'.http_build_query($parameters));
        $curlOptions = array(
            CURLOPT_SSL_VERIFYPEER  => $this->opts['verify_ssl'],
            CURLOPT_FOLLOWLOCATION  => true,
            CURLOPT_REFERER         => $url,
            CURLOPT_RETURNTRANSFER  => true
        );
        
        // set the body of the request, if there is one. 
        //
        if ($request != 'GET' && $body) {
            $curlOptions[CURLOPT_CUSTOMREQUEST, $request];
            $curlOptions[CURLOPT_POSTFIELDS, $body];
            $curlOptions[CURLINFO_CONTENT_TYPE, 'application/json'];
        }
        
        curl_setopt_array($curl, $curlOptions);
        $response = curl_exec($curl);
        $error = curl_error($curl);
        $this->lastRequestInfo = curl_getinfo($curl);
        curl_close($curl);

        if ($response) {
            return $this->parseResponse( $response );
        }
        
        // TODO: handle error generation
        //
        return $error;
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
        $requestUrl = $this->parseGet( $this->apiUrl . $request, $parameters );
        return $this->request($requestUrl);
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
