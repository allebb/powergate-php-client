<?php

namespace Ballen\PowergateClient;

use Ballen\PowergateClient\Services\PowergateClient;

class Record extends PowergateClient
{

    public function find($id)
    {
        return $this->getRecord($id)->record;
    }

    public function create(array $array)
    {
        return $this->createRecord($array)->record;
    }

    public function all()
    {
        return $this->getRecords()->records;
    }

    public function update($id, array $array)
    {
        $existing = json_decode(json_encode($this->find($id)), true);
        return $this->updateRecord($id, array_merge($existing, $array))->record;
    }

    public function delete($id)
    {
        return $this->deleteRecord($id);
    }

}
