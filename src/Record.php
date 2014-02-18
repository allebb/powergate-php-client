<?php

namespace Ballen\PowergateClient;

use Ballen\PowergateClient\Services\Client;

class Record extends Client
{

    public function find($id)
    {
        return json_decode($this->getRecord($id))->record;
    }

    public function create(array $array)
    {
        return $this->createRecord($array)->record;
    }

    public function all()
    {
        return $this->getRecords()->records;
    }

    public function update(array $array)
    {
        
    }

    public function delete($id)
    {
        return $this->deleteRecord($id);
    }

    public function commitSOAChanges()
    {

    }

}
