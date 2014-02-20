<?php

namespace Ballen\PowergateClient;

use Ballen\PowergateClient\Services\PowergateClient;

class Record extends PowergateClient
{

    /**
     * Find an return a single record.
     * @param int $id The record ID of which to return.
     * @return stdClass
     */
    public function find($id)
    {
        return $this->getRecord($id)->record;
    }

    /**
     * Create a new record.
     * @param array $array Array of keys and values to create a record from.
     * @return stdClass
     */
    public function create(array $array)
    {
        return $this->createRecord($array)->record;
    }

    /**
     * Return all current records.
     * @return stdClass
     */
    public function all()
    {
        return $this->getRecords()->records;
    }

    /**
     * Update an existing record.
     * @param int $id The ID of the record of which to update.
     * @param array $array Array of keys and values to update the record with.
     * @return stdClass
     */
    public function update($id, array $array)
    {
        $existing = json_decode(json_encode($this->find($id)), true);
        return $this->updateRecord($id, array_merge($existing, $array))->record;
    }

    /**
     * Delete a record.
     * @param int $id The ID of the record to delete.
     * @return stdClass
     */
    public function delete($id)
    {
        return $this->deleteRecord($id);
    }

}
