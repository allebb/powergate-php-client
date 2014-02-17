<?php

namespace Ballen\PowergateClient;

use Guzzle\Http\Client as GuzzleClient;

class Client
{

    /**
     * Instance of the Guzzle HTTP client.
     * @var Guzzle\Http\Client
     */
    protected $client;

    public function __construct($baseUrl, $user, $key)
    {
        $this->client = new GuzzleClient($baseUrl);
        $this->client->setDefaultOption('auth', array($user, $key));
    }

    /**
     * Return all domains currently configured on the PowerGate API server.
     * @return string
     */
    public function getDomains()
    {
        try {
            $response = $this->client->get('domains')->send();
            return $response->getBody();
        } catch (ClientErrorResponseException $e) {
            var_dump($e);
        }
        return $response->getBody();
    }

    /**
     * Return all records currently configured on the PowerGate API server.
     * @return type
     */
    public function getRecords()
    {
        try {
            $response = $this->client->get('records')->send();
            return $response->getBody();
        } catch (ClientErrorResponseException $e) {
            var_dump($e);
        }
    }

    /**
     * Return a specific domain including it's child records.
     * @param int $id The domain ID of which to fetch.
     * @return type
     */
    public function getDomain($id)
    {
        try {
            $response = $this->client->get("domains/$id/records")->send();
            return $response->getBody();
        } catch (ClientErrorResponseException $e) {
            var_dump($e);
        }
    }

    /**
     * Return a specific record from the PowerGate API server.
     * @param int $id The ID of the record of which to fetch.
     * @return type
     */
    public function getRecord($id)
    {
        try {
            $response = $this->client->get("records/$id/domain")->send();
            return $response->getBody();
        } catch (ClientErrorResponseException $e) {
            var_dump($e);
        }
    }

}
