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

}
