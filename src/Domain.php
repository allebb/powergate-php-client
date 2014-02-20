<?php

namespace Ballen\PowergateClient;

use Ballen\PowergateClient\Services\PowergateClient;

class Domain extends PowergateClient
{

    /**
     * Find an return a single domain.
     * @param int $id The domain ID of which to return.
     * @return stdClass
     */
    public function find($id)
    {
        return $this->getDomain($id)->domain;
    }

    /**
     * Create a new domain.
     * @param array $array Array of keys and values to create a domain from.
     * @return stdClass
     */
    public function create(array $array)
    {
        return $this->createDomain($array)->domain;
    }

    /**
     * Return all current domains.
     * @return stdClass
     */
    public function all()
    {
        return $this->getDomains()->domains;
    }

    /**
     * Update an existing domain.
     * @param int $id The ID of the domain of which to update.
     * @param array $array Array of keys and values to update the domain with.
     * @return stdClass
     */
    public function update($id, array $array)
    {
        $existing = json_decode(json_encode($this->find($id)), true);
        return $this->updateDomain($id, array_merge($existing, $array))->domain;
    }

    /**
     * Delete a domain.
     * @param int $id The ID of the domain to delete.
     * @return stdClass
     */
    public function delete($id)
    {
        return $this->deleteDomain($id);
    }

    /**
     * Increments the SOA serial number for a given domain, PowerDNS uses this to 'trigger' SLAVE server NOTIFY's.
     * @param int $id The domain ID of which you wish to incremement the SOA serial number for.
     * @return stdClass
     */
    public function commitSerialUpdate($id)
    {
        $records = $this->getDomain($id)->domain->records;
        foreach ($records as $record) {
            if ($record->type == 'SOA') {
                $soa = $record;
                break;
            }
        }
        $soa_parts = explode(' ', $soa->content);
        $incremented = $this->generateSOASerial($soa_parts[2]);
        $new_soa = implode(' ', array_replace($soa_parts, ['2' => $incremented]));
        return $this->updateRecord($id, array_merge(json_decode(json_encode($record), true), ['content' => $new_soa]));
    }

}
