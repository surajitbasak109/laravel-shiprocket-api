<?php

namespace Seshac\Shiprocket;

use Seshac\Shiprocket\Traits\Authenticate;
use Seshac\Shiprocket\Resources\OrderResource;
use Seshac\Shiprocket\Clients\ShiprocketClient;
use Seshac\Shiprocket\Resources\PickupResource;
use Seshac\Shiprocket\Resources\CourierResource;

class ShiprocketApi
{

    use Authenticate;
    
    public $client;
  
    public function __construct(ShiprocketClient $client)
    {
        $this->client = $client;
    } 

    /**
     * Get the auth token (valid for 24 hours)
     *
     * @param array $credentials
     * @return void
     */
    public function getToken(array $credentials) {
        return $this->login($this->client, $credentials);
    }

    /**
     * Order related wrapper class
     *
     * @param string $token
     * @return object
     */
    public function order(string $token) :object
    {
        return new OrderResource($this->client, $token);
    }

    /**
     * Pickup related wrapper class
     *
     * @param string $token
     * @return object
     */
    public function pickup(string $token) :object
    {
        return new PickupResource($this->client, $token);
    }
    
    /**
     * Courier related wrapper class
     *
     * @param string $token
     * @return object
     */
    public function courier(string $token) :object
    {
        return new CourierResource($this->client, $token);
    }

}
