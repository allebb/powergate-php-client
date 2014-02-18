<?php

namespace Ballen\PowergateClient;

use Ballen\PowergateClient\Services\Client;

class Domain extends Client
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

    public function commitSOAChanges($id)
    {
        $records = $this->getRecords()->records;
        foreach ($records as $record) {
            if ($record->type == 'SOA') {
                $soa = $record;
                break;
            }
        }
        $soa_parts = explode(' ', $soa->content);
        $incremented = (int) $soa_parts[2] + 1;
        $new_soa = implode(' ', array_replace($soa_parts, ['2' => $incremented]));
        $this->updateRecord($id, $array);
    }

}
