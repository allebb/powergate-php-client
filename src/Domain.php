<?php

namespace Ballen\PowergateClient;

use Ballen\PowergateClient\Services\PowergateClient;

class Domain extends PowergateClient
{

    public function find($id)
    {
        return $this->getDomain($id)->domain;
    }

    public function create(array $array)
    {
        return $this->createDomain($array)->domain;
    }

    public function all()
    {
        return $this->getDomains()->domains;
    }

    public function update($id, array $array)
    {
        $existing = json_decode(json_encode($this->find($id)), true);
        return $this->updateDomain($id, array_merge($existing, $array))->domain;
    }

    public function delete($id)
    {
        return $this->deleteDomain($id);
    }

    /**
     * Increments the SOA serial number for a given domain, PowerDNS uses this to 'trigger' SLAVE server NOTIFY's.
     * @param int $id The domain ID of which you wish to incremement the SOA serial number for.
     * @return type
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
