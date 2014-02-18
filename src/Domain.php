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

    public function update(array $array)
    {
        
    }

    public function delete($id)
    {
        return $this->deleteDomain($id);
    }

}
