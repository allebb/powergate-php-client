<?php

namespace Ballen\PowergateClient\Services;

use Guzzle\Http\Client as GuzzleClient;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Guzzle\Http\Exception\CurlException;
use Ballen\PowergateClient\Exceptions\UnauthorisedAccessAPIException;
use Ballen\PowergateClient\Exceptions\ValidationAPIException;
use Ballen\PowergateClient\Exceptions\ResourceNotFoundAPIException;
use Ballen\PowergateClient\Exceptions\ProxyAuthorisationAPIException;
use Ballen\PowergateClient\Exceptions\ServerErrorException;
use Ballen\PowergateClient\Exceptions\SoaOutOfRangeException;
use \Exception;

class PowergateClient
{

    /**
     * Instance of the Guzzle HTTP client.
     * @var GuzzleClient
     */
    protected $client;

    /**
     * Initiates a new Powergate Client object.
     *
     * @param string $baseUrl The base URL of the API (including trailing slash)
     * @param string $user The Powergate API user
     * @param string $key The Powergate API key
     * @param array $options Optional Guzzle HTTP Client configuration such as proxy server configuration etc. (see http://guzzle.readthedocs.org/en/latest/http-client/client.html#configuration-options)
     */
    public function __construct($baseUrl, $user, $key, $options = null)
    {
        $this->client = new GuzzleClient($baseUrl, $options);
        $this->client->setDefaultOption('auth', array($user, $key));
    }

    /**
     *
     * Return all domains currently configured on the PowerGate API server.
     *
     * @return mixed|void
     * @throws ProxyAuthorisationAPIException
     * @throws ResourceNotFoundAPIException
     * @throws ServerErrorException
     * @throws UnauthorisedAccessAPIException
     * @throws ValidationAPIException
     */
    public function getDomains()
    {
        try {
            $response = $this->client->get('domains')->send();
        } catch (ClientErrorResponseException $e) {
            return $this->handleException($e);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
        return json_decode($response->getBody());
    }

    /**
     * Return all records currently configured on the PowerGate API server.
     *
     * @return mixed|void
     * @throws ProxyAuthorisationAPIException
     * @throws ResourceNotFoundAPIException
     * @throws ServerErrorException
     * @throws UnauthorisedAccessAPIException
     * @throws ValidationAPIException
     */
    public function getRecords()
    {
        try {
            $response = $this->client->get('records')->send();
        } catch (ClientErrorResponseException $e) {
            return $this->handleException($e);
        }
        return json_decode($response->getBody());
    }

    /**
     * Return a specific domain including it's child records.
     *
     * @param $id
     * @return mixed|void
     * @throws ProxyAuthorisationAPIException
     * @throws ResourceNotFoundAPIException
     * @throws ServerErrorException
     * @throws UnauthorisedAccessAPIException
     * @throws ValidationAPIException
     */
    public function getDomain($id)
    {
        try {
            $response = $this->client->get("domains/$id/records")->send();
        } catch (ClientErrorResponseException $e) {
            return $this->handleException($e);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
        return json_decode($response->getBody());
    }

    /**
     * Creates a new domain record from an array
     *
     * @param array $array
     * @return mixed|void
     * @throws ProxyAuthorisationAPIException
     * @throws ResourceNotFoundAPIException
     * @throws ServerErrorException
     * @throws UnauthorisedAccessAPIException
     * @throws ValidationAPIException
     */
    public function createDomain(array $array)
    {
        try {
            $response = $this->client->post('domains', [], $array)->send();
        } catch (ClientErrorResponseException $e) {
            return $this->handleException($e);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
        return json_decode($response->getBody());
    }

    /**
     * Updates a domain by ID with updated data from the given array.
     *
     * @param $id
     * @param array $array
     * @return mixed|void
     * @throws ProxyAuthorisationAPIException
     * @throws ResourceNotFoundAPIException
     * @throws ServerErrorException
     * @throws UnauthorisedAccessAPIException
     * @throws ValidationAPIException
     */
    public function updateDomain($id, array $array)
    {
        try {
            $response = $this->client->put('domains/' . $id, [], $array)->send();
        } catch (ClientErrorResponseException $e) {
            return $this->handleException($e);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
        return json_decode($response->getBody());
    }

    /**
     * Deletes a domain from its ID.
     *
     * @param $id
     * @throws ProxyAuthorisationAPIException
     * @throws ResourceNotFoundAPIException
     * @throws ServerErrorException
     * @throws UnauthorisedAccessAPIException
     * @throws ValidationAPIException
     */
    public function deleteDomain($id)
    {
        try {
            return $this->client->delete('domains/'.$id)->send();
        } catch (ClientErrorResponseException $e) {
            return $this->handleException($e);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }

    /**
     * Return a specific record from the PowerGate API server.
     *
     * @param $id
     * @return mixed|void
     * @throws ProxyAuthorisationAPIException
     * @throws ResourceNotFoundAPIException
     * @throws ServerErrorException
     * @throws UnauthorisedAccessAPIException
     * @throws ValidationAPIException
     */
    public function getRecord($id)
    {
        try {
            $response = $this->client->get("records/$id/domain")->send();
        } catch (ClientErrorResponseException $e) {
            return $this->handleException($e);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
        return json_decode($response->getBody());
    }

    /**
     * Creates a new DNS record from an array.
     *
     * @param array $array
     * @return mixed|void
     * @throws ProxyAuthorisationAPIException
     * @throws ResourceNotFoundAPIException
     * @throws ServerErrorException
     * @throws UnauthorisedAccessAPIException
     * @throws ValidationAPIException
     */
    public function createRecord(array $array)
    {
        try {
            $response = $this->client->post('records', [], ['body' => $array])->send();
        } catch (ClientErrorResponseException $e) {
            return $this->handleException($e);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
        return json_decode($response->getBody());
    }

    /**
     * Updates a record by ID with updated data from the given array.
     *
     * @param $id
     * @param array $array
     * @return mixed|void
     * @throws ProxyAuthorisationAPIException
     * @throws ResourceNotFoundAPIException
     * @throws ServerErrorException
     * @throws UnauthorisedAccessAPIException
     * @throws ValidationAPIException
     */
    public function updateRecord($id, array $array)
    {
        try {
            $response = $this->client->put('records/' . $id, [], $array)->send();
        } catch (ClientErrorResponseException $e) {
            return $this->handleException($e);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
        return json_decode($response->getBody());
    }

    /**
     * Deletes a record from its ID.
     *
     * @param $id
     * @return mixed|void
     * @throws ProxyAuthorisationAPIException
     * @throws ResourceNotFoundAPIException
     * @throws ServerErrorException
     * @throws UnauthorisedAccessAPIException
     * @throws ValidationAPIException
     */
    public function deleteRecord($id)
    {
        try {
            $response = $this->client->delete('records/'.$id)->send();
        } catch (ClientErrorResponseException $e) {
            return $this->handleException($e);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
        return json_decode($response->getBody());
    }

    /**
     * Generates a valid RFC1912 2.2 specific DNS Serial number or will increment if an existing one is provided otherwise a new one will be generated.
     *
     * @param int $current Optional serial number of which will be automatically incremented if provided.
     * @return int
     * @throws SoaOutOfRangeException
     */
    protected function generateSOASerial($current = null)
    {
        if (!$current) {
            $serial = date('Ymd') . '00';
        } else {
            $increment = str_pad(substr($current, 8, 2) + 1, 2, 0, STR_PAD_LEFT);
            if ($increment <= 99) {
                return date('Ymd') . $increment;
            }
            throw new SoaOutOfRangeException;
        }
        return $serial;
    }

    /**
     * Handles and dispatches Powergate client specific exceptions.
     *
     * @param ClientErrorResponseException|CurlException $exception
     * @throws ProxyAuthorisationAPIException
     * @throws ResourceNotFoundAPIException
     * @throws ServerErrorException
     * @throws UnauthorisedAccessAPIException
     * @throws ValidationAPIException
     */
    private function handleException($exception)
    {
        if ($exception instanceof ClientErrorResponseException) {
            switch ($exception->getResponse()->getStatusCode()) {
                case 400:
                    throw new ValidationAPIException;
                case 401:
                    throw new UnauthorisedAccessAPIException;
                case 404:
                    throw new ResourceNotFoundAPIException;
                case 407:
                    throw new ProxyAuthorisationAPIException;
                default :
                    throw new ServerErrorException($exception->getMessage());
            }
        } else {
           throw new Exception($exception->getError(), $exception->getCode());
        }
    }

}
