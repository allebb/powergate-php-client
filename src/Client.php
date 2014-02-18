<?php

namespace Ballen\PowergateClient;

use Guzzle\Http\Client as GuzzleClient;
use Guzzle\Http\Exception\ClientErrorResponseException;

class Client
{

    /**
     * Instance of the Guzzle HTTP client.
     * @var Guzzle\Http\Client
     */
    protected $client;

    /**
     * Initiates a new Powergate Client object.
     * @param type $baseUrl The base URL of the API (including trailing slash)
     * @param type $user The Powergate API user
     * @param type $key The Powergate API key
     * @param type $options Optional Guzzle HTTP Client configuration such as proxy server configuration etc. (see http://guzzle.readthedocs.org/en/latest/http-client/client.html#configuration-options)
     */
    public function __construct($baseUrl, $user, $key, $options = null)
    {
        $this->client = new GuzzleClient($baseUrl, $options);
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
            return $this->handleException($e);
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
            return $this->handleException($e);
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
            return $this->handleException($e);
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
            return $this->handleException($e);
        }
    }

    /**
     * Handles and dispatches Powergate client specific exceptions.
     * @param  $ex Exception
     * @param Guzzle\Http\Client $response
     */
    private function handleException($exception)
    {
        var_dump($exception->getMessage());
    }

}
